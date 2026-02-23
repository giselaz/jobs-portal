@extends('errors.layout')

@section('code', '403')
@section('title', 'Forbidden')
@section('message', "You don't have permission to access this resource.")

@section('action_url', route('jobs.index'))
@section('action_text', 'Back to jobs')
