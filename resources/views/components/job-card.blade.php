 <div {{ $attributes->class(['rounded-md p-4 shadow-md bg-white ']) }}>
    <div class="mb-4 flex justify-between">
         <h2 class="text-lg font-medium">{{ $job->title }}</h2>
         <div class="text-slate-500">
             ${{ number_format($job->salary) }}
         </div>
     </div>
     <div class="mb-4 flex justify-between text-sm text-slate-500">
         <div class="flex space-x-4  items-center ">
             <div>{{ $job->employer->company_name }}</div>
             <div>{{ $job->location }}</div>
         </div>
         <div class="flex space-x-1 text-xs items-center ">
             <x-tag class=" bg-cyan-500 text-white ">{{ Str::ucfirst($job->experience) }}</x-tag>
             <x-tag class="bg-indigo-500 text-white">{{ $job->category }}</x-tag>
         </div>

     </div>

     {{ $slot }}
 </div>
