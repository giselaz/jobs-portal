 @props([
     'profile' => $profile,
 ])
 <div class="lg:col-span-1">
     <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
         <!-- User Info -->
         <div class="mb-6 text-center">
             <x-initials-avatar :name="Auth::user()->name" />
             <h2 class="text-lg font-semibold text-slate-900">{{ Auth::user()->name }}</h2>
             <p class="text-sm text-slate-500">{{ Auth::user()->email }}</p>
         </div>

         <nav class="space-y-2">
             <a href="{{ route('profile.edit', $profile) }}"
                 class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition">
                 <x-heroicon-o-pencil-square class="size-5" />
                 Edit Profile
             </a>

             <a href="{{ route('my-job-application.index') }}"
                 class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition">
                 <x-heroicon-o-briefcase class="size-5" />
                 My Applications
                 @php
                     $applicationCount = Auth::user()->jobApplications()->count();
                 @endphp
                 @if ($applicationCount > 0)
                     <span
                         class="ml-auto rounded-full bg-violet-100 px-2.5 py-0.5 text-xs font-semibold text-violet-700">
                         {{ $applicationCount }}
                     </span>
                 @endif
             </a>

             @if ($profile?->cv_path)
                 <a href="{{ route('candidate.cv.download') }}"
                     class="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-violet-50 hover:text-violet-700 transition">
                     <x-heroicon-o-document class="size-5" />
                     View CV
                 </a>
             @endif
         </nav>
     </div>
 </div>
