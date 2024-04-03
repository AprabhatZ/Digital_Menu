<x-starter-layout>
	<x-slot name='title'>Create Category</x-slot>
	<h1>this is category</h1>
	<form method="post"  action="{{ route('category.store') }}" >
		@csrf
		@method('post')
		
		@if ($errors->any())
			<div class="bg-red-200 p-4 text-red-700"> 
				<ul>
					@foreach ($errors ->all() as $error)
					<li >{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif
		
		<div class="w-full p-4 bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700 grid gap-6 my-6 md:grid-cols-2 items-center">
			<div>
				<label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of Category</label>
				<input name="category_name" type="text" id="category_name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-300 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-300 dark:focus:border-orange-300" placeholder="Soft Drink" required>
			</div>
			<div class="mt-6">
				<input type="submit" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-orange-500 dark:hover:bg-orange-600 dark:focus:ring-orange-300" value="Add Category">
			</div>
		</div> 
	</form>		

</x-starter-layout>