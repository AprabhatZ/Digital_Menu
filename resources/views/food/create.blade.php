<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <h1>Create product</h1>
    <h1 class="text-5xl font-extrabold dark:text-white text-center"><a href="../index.php" class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-gray-300 mr-4">Product List</a>/ Add Product </h1>

				<form method="post"  action="{{ route('food.store') }}"  enctype="multipart/form-data">
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
					
				    <div class="w-full p-4 bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700 grid gap-6 my-6 md:grid-cols-2 ">
				        <div>
				        	<label for="food_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of Food</label>
				            <input name="food_name" type="text" id="name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-300 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-300 dark:focus:border-orange-300" placeholder="veg-chaumin" required>
				        </div>
                      
						<div>
				        	<label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price of Food</label>
				            <input name="price" type="number" value="200" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-300 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-300 dark:focus:border-orange-300" placeholder="120.00" required>
                        </div>
				        <div >
				        	<label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Category</label>
							<select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-300 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-300 dark:focus:border-orange-300">
							 @foreach($categories as $category)
							 <option value="{{$category->id}}">{{$category->category_name}}</option>
							 @endforeach
						  	</select>
				        </div>
                        <div>
				        	<label for="image_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image Link(Upload Image Link)</label>
				            <input name="image_link" value="" type="text" id="image_link"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-300 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-300 dark:focus:border-orange-300" placeholder="https://unsplash.com/photos/grilled-meat-and-vegetable-on-the-table-UC0HZdUitWY" required>
				        </div>
                        <div>
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description of Food</label>
                            <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a short description about the food..."></textarea>
                        </div>
                       
					    <div class="">
					    	<input type="submit" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-orange-500 dark:hover:bg-orange-600 dark:focus:ring-orange-300" value="Add Food">
					    </div>
				    </div> 
				</form>		


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>