<form action="{{ route('candidate.cv.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-card class="border mt-6">
            <x-label for="cv_path" :required="false">Upload CV</x-label>
            <x-file-input name="cv_path"/>
            <div class="mt-4">
                <x-button type="submit" variant="primary" :disabled="isset($processing) && $processing">
                    {{ isset($processing) && $processing ? 'Processing...' : 'Upload' }}
                </x-button>
            </div>
        </x-card>

    </form>