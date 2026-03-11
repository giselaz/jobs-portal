<?php
// app/Services/CvParserService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Smalot\PdfParser\Parser;

class CvParserService
{
    public function parseAndFillProfile($filePath, $candidateProfile)
    {
        $text = $this->extractText($filePath);
        $data = $this->sendToOllama($text);
        $this->fillProfile($data, $candidateProfile);
    }

    public function extractText($filePath)
    {
        $ext = pathinfo($filePath, PATHINFO_EXTENSION);

        if (strtolower($ext) === 'pdf') {
            $parser = new Parser();
            $pdf = $parser->parseFile($filePath);
            return $pdf->getText();
        }

        // For DOC/DOCX just read contents (you can improve later)
        return file_get_contents($filePath);
    }

    public function sendToOllama($text)
    {
        try {
            $prompt = "You are a JSON extractor. Extract the following fields from the resume below and return ONLY a valid JSON object with no explanation, no markdown, no code blocks.
             Fields: skills (array of objects name/level),
              experience (array of objects with job_title/company_name/location/start_date/end_date/is_current), 
              education (array of objects with degree/institution/field_of_study/start_date/end_date), 
              languages (array of objects language/proficiency). .
                    Resume:
                    $text
                    Return ONLY the JSON object:";
            $promise = Http::async()->timeout(120)->post('http://localhost:11434/api/generate', [
                "model" => "kimi-k2.5:cloud",
                "prompt" => $prompt,
                "stream" => false
            ]);

            $response = $promise->wait(); // Returns a Guzzle ResponseInterface

            $jsonString = $result['response'] ?? '{}';
            // if ($response->getStatusCode() !== 200) {
            //     throw new \Exception('Ollama request failed: ' . $response->getBody());
            // }

            $result = $response->json();
            $jsonString = $result['response'] ?? '{}';


            // Strip any accidental markdown code blocks
            $jsonString = preg_replace('/```json|```/', '', $jsonString);
            $jsonString = trim($jsonString);
            return json_decode($jsonString, true) ?? [];
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Ollama is not running or wrong URL/port
            throw new \Exception('Could not connect to Ollama. Is it running? Error: ' . $e->getMessage());
        }
    }
    public function parseDate($dateString)
    {
        if (empty($dateString) || strtolower(trim($dateString)) === 'present') {
            return null;
        }

        try {
            return \Carbon\Carbon::parse(str_replace('.', '', $dateString))->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
    public function fillProfile($data, $profile)
    {
        foreach ($data['education'] ?? [] as $edu) {
            $profile->educations()->updateOrCreate(
                ['degree' => $edu['degree']],
                [
                    'institution'    => $edu['institution'],
                    'field_of_study' => $edu['field_of_study'] ?? null,
                    'start_date'     => $this->parseDate($edu['start_date'] ?? null),
                    'end_date'       => $this->parseDate($edu['end_date'] ?? null),
                ]
            );
        }

        foreach ($data['experience'] ?? [] as $exp) {
            $profile->experiences()->updateOrCreate(
                ['job_title' => $exp['job_title']],
                [
                    'company_name' => $exp['company_name'],
                    'location'     => $exp['location'] ?? null,
                    'start_date'   => $this->parseDate($exp['start_date'] ?? null),
                    'end_date'     => $this->parseDate($exp['end_date'] ?? null),
                    'is_current'   => strtolower($exp['end_date'] ?? '') === 'present',
                ]
            );
        }

        foreach ($data['skills'] ?? [] as $skill) {
            $profile->skills()->create(['name' => $skill['name']]);
        }

        foreach ($data['languages'] ?? [] as $lang) {
            $profile->languages()->create($lang);
        }

        $profile->is_profile_complete = true;
        $profile->save();
    }
}
