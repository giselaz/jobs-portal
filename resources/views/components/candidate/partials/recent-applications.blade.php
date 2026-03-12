  @props([
    'recentApplications'
  ])
  <x-card class="border">
                                <x-card-header>
                                    <h2 class="text-lg font-semibold text-slate-900">Recent Applications</h2>
                                    <a href="{{ route('my-job-application.index') }}"
                                        class="text-sm font-medium text-violet-600 hover:text-violet-700">View all</a>
                                </x-card-header>
                                <x-card-body>
                                    <div class="space-y-4">
                                        @foreach ($recentApplications as $application)
                                            <div
                                                class="flex items-center justify-between rounded-lg border border-slate-200 p-4">
                                                <div>
                                                    <h3 class="font-medium text-slate-900">
                                                        {{ $application->jobPortal->title }}</h3>
                                                    <p class="text-sm text-slate-500">
                                                        {{ $application->jobPortal->employer->company_name ?? 'Company' }}
                                                    </p>
                                                </div>
                                                <div class="text-right">
                                                    <span
                                                        class="@if ($application->status === 'pending') text-yellow-600 @elseif($application->status === 'accepted') text-green-600 @else text-slate-600 @endif text-sm font-medium">
                                                        {{ ucfirst($application->status) }}
                                                    </span>
                                                    <p class="text-xs text-slate-500">
                                                        {{ $application->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </x-card-body>
                            </x-card>