<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>
<div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full text-left text-sm font-light">
          <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
              <th scope="col" class="px-6 py-4">#</th>
              <th scope="col" class="px-6 py-4">From</th>
              <th scope="col" class="px-6 py-4">Amount</th>
              <th scope="col" class="px-6 py-4">Description</th>
              <th scope="col" class="px-6 py-4">Level</th>
              <th scope="col" class="px-6 py-4">created_at</th>
              <th scope="col" class="px-6 py-4">updated_at</th>
            </tr>
          </thead>
          <tbody>
			@if(!empty($transactions))
				@foreach($transactions as $transction)
					  <tr class="border-b dark:border-neutral-500">
					    <td class="whitespace-nowrap px-6 py-4"> {{$loop->iteration}}</td>
					    <td class="whitespace-nowrap px-6 py-4"> @if(!empty($transction->user))
					    	{{$transction->user->name}}
					    @endif
						</td>
					    <td class="whitespace-nowrap px-6 py-4">{{$transction->amount}}</td>
					    <td class="whitespace-nowrap px-6 py-4">{{$transction->description}}</td>
					    <td class="whitespace-nowrap px-6 py-4">{{$transction->level}}</td>
					    <td class="whitespace-nowrap px-6 py-4">{{$transction->created_at}}</td>
					    <td class="whitespace-nowrap px-6 py-4">{{$transction->updated_at}}</td>
					  </tr>
				@endforeach
			@else
			  <tr class="border-b dark:border-neutral-500">
			    <td colspan="4" class="whitespace-nowrap px-6 py-4 font-medium">No record found</td>
			  </tr>					
			@endif           	
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>    

</x-app-layout>