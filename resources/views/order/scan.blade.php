<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hamro Resturant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    

</head>
<body class="bg-gray-100">
    <span class="w-full">
        <span>You are at </span>
        <span class="text-orange-500">Table {{$table->table_name}}</span>
      </span>
      <form class="max-w-[372px] mx-auto my-[16px]">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-300 focus:border-orange-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-300 dark:focus:border-orange-300" placeholder="Search Food, Drinks..." required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-200 font-medium rounded-lg text-sm px-4 py-2 dark:bg-orange-500 dark:hover:bg-orange-600 dark:focus:ring-orange-300">Search</button>
        </div>
    </form>
    <main class="mb-64 self-stretch overflow-y-auto flex flex-row flex-wrap items-start justify-center py-[0rem] px-3 box-border gap-[1rem_0.75rem] min-h-[53rem] text-left text-[1rem] text-gray-900 font-leading-tight-text-sm-font-normal">
    @foreach ($foods as $food )


    <div
     id="card-bg{{$food->id}}" class="border-solid border-[2px] bg-white h-[17rem] w-[11.125rem] rounded-md flex flex-col items-start justify-start p-[0.75rem] box-border gap-[0.5rem]">
    <img
      class="w-[9.625rem] h-[9.625rem] relative rounded-md overflow-hidden shrink-0 object-cover"
      loading="lazy"
      alt=""
      src="{{ $food->image_link}}"
    />

    <div class="self-stretch relative leading-[125%] font-medium">
        {{ $food->food_name}}
    </div>
    <div
      class="self-stretch flex flex-row items-end justify-between gap-[1.25rem] text-[0.75rem] text-gray-700"
    >
      <div class="relative text-[10px] leading-[125%] inline-block min-w-[3.313rem]">
        {{ $food->category->category_name}}
      </div>
      <div
        class="flex flex-row items-end justify-end gap-[0.25rem] text-[0.875rem] text-orange-500"
      >
        <div
          class="relative leading-[1.125rem] font-medium inline-block min-w-[1.313rem]"
        >
          Rs.
        </div>
        <div
          class="relative leading-[1.125rem] font-medium inline-block min-w-[2.938rem]"
        >
        {{ $food->price}}
        </div>
      </div>
    </div>
    <div
      class="self-stretch h-[2rem] rounded bg-orange-100 flex flex-row items-start justify-start pt-[0.156rem] px-[0rem] pb-[0.375rem] box-border relative gap-[0.625rem] cursor-pointer text-center text-orange-500"
      id="addButton{{$food->id}}" onclick="incrementQuantity('{{$food->id}}','{{$food->price}}')"
    >
      <div  class="flex-1 relative leading-[125%] font-medium">Add  +</div>
    </div>
    <div class="self-stretch h-[2rem] flex flex-row items-stretch justify-center pt-[0.156rem] px-[0rem] pb-[0.375rem] box-border relative gap-[16px] text-center ">
        <button id="decrementButton{{$food->id}}" class="bg-gray-700 text-white  rounded-md font-semibold size-6  pb-[4px]" onclick="decrementQuantity('{{$food->id}}')" style="display: none;">-</button>
        <div class="font-semibold text-lg text-center " id="quantityDisplay{{$food->id}}" style="display: none;">0</div>
        <button id="incrementButton{{$food->id}}" class="bg-orange-500 text-white  rounded-md font-semibold size-6 pb-[4px]" onclick="incrementQuantity('{{$food->id}}')" style="display: none;">+</button>
    </div>

  </div>

  @endforeach
</main>

    <div
      class="pb-36 shadow-[0px_-4px_16px_rgba(0,_0,_0,_0.12)] w-full fixed bottom-[-144px] bg-gray-100 flex flex-col items-start justify-start gap-[455px] tracking-[normal] text-center text-mid text-labels-primary font-callout-regular"
    >
  <footer
  class="self-stretch bg-white overflow-hidden flex flex-row items-start justify-start py-[21px] px-[20.5px] box-border max-w-full text-right text-xs text-gray-900 font-leading-tight-text-sm-font-normal"
>
  <div
    class="flex-1 overflow-x-auto flex flex-row items-start justify-between max-w-full gap-[20px]"
  >
    <div
      class="w-[90px] shrink-0 flex flex-col items-start justify-start pt-[9.5px] px-0 pb-0 box-border"
    >
      <div
        class="self-stretch relative inline-block min-w-[90px] whitespace-nowrap"
      >
        <span class="font-medium">
          <span>Total:</span>
          <span class="text-base text-orange-500">Rs.</span>
        </span>
        <span id="totalPrice" class="text-base font-semibold text-orange-500"
          >0.00</span
        >
      </div>
    </div>
    <div
      class="w-[38px] shrink-0 flex flex-col items-start justify-start pt-[9.5px] px-0 pb-0 box-border text-center"
    >
      <div
        class="self-stretch relative inline-block min-w-[38px] whitespace-nowrap"
      >
        <span class="font-medium">
          <span>Qty:</span>
          <span class="text-2xs"> </span>
        </span>
        <span id="totalQuantity" class="text-base font-semibold text-orange-500">0</span>
      </div>
    </div>
    <form action="{{route('order.cart', $table->id)}}" method="post" id="form_view_order">
    @csrf
    <input type="hidden" name="order_data" id="order_data">
    </form>
    <a type="button" 
    href="#" onclick="submitOrderForm()"  
      class="cursor-pointer [border:none] py-2.5 px-5 bg-orange-500 rounded-[6px] overflow-hidden shrink-0 flex flex-row items-start justify-start whitespace-nowrap hover:bg-orangered"
    >
      <div
        class="w-[75px] relative text-sm leading-[18px] font-medium font-leading-tight-text-sm-font-normal text-white text-center flex items-center justify-center min-w-[75px] whitespace-nowrap"
      >
        View Order
      </div>
    </a>
  </div>
</footer>
</div>
        
    <div>
        @if(session()->has('success'))
        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"  role="alert" aria-live="assertive" aria-atomic="true">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{session('success')}}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        @endif
        
    </div>



</body>
</html>
<script>
  // Use an object to store quantities for each food item
  const quantities = {};
  function incrementQuantity(foodId,price) {

      if (!quantities[foodId]) {
          quantities[foodId] = { quantity: 0, price: price };
      }
      quantities[foodId].quantity++;
      updateQuantityDisplay(foodId);
      updateTotalQuantityDisplay(); // Update total quantity display
      updateTotalPriceDisplay(); // Update total price display
      updateLocalStorage();
      
  }

  function decrementQuantity(foodId) {
      if (quantities[foodId] && quantities[foodId].quantity > 0) {
          quantities[foodId].quantity--;
          updateQuantityDisplay(foodId);
          updateTotalPriceDisplay(); // Update total price display
          updateTotalQuantityDisplay(); // Update total quantity display
          updateLocalStorage();

      }
  }

  function updateQuantityDisplay(foodId) {
      const addButton = document.getElementById('addButton'+foodId);
      const quantityDisplay = document.getElementById('quantityDisplay'+foodId);
      const decrementButton = document.getElementById('decrementButton'+foodId);
      const incrementButton = document.getElementById('incrementButton'+foodId);
      const cardBg = document.getElementById('card-bg'+foodId);
      

      if (!quantities[foodId] || quantities[foodId].quantity === 0) {
          addButton.style.display = 'inline-block';
          quantityDisplay.style.display = 'none';
          decrementButton.style.display = 'none';
          incrementButton.style.display = 'none';
          cardBg.classList.remove('bg-orange-50');
          cardBg.classList.remove('border-orange-500');
          cardBg.classList.add('bg-white');
      } else {
          addButton.style.display = 'none';
          quantityDisplay.style.display = 'inline-block';
          decrementButton.style.display = 'inline-block';
          incrementButton.style.display = 'inline-block';
          cardBg.classList.remove('bg-white');
          cardBg.classList.add('bg-orange-50');
          cardBg.classList.add('border-orange-500');
      }

      quantityDisplay.textContent = quantities[foodId].quantity || 0; // Show 0 if quantity is undefined
  }
  function updateTotalQuantityDisplay() {
      const totalQuantityDisplay = document.getElementById('totalQuantity');
      totalQuantityDisplay.textContent = getTotalQuantity();
  }
  function getTotalQuantity() {
      let totalQuantity = 0;
      for (const foodId in quantities) {
          totalQuantity += quantities[foodId].quantity;
      }
      return totalQuantity;
  }

  function updateTotalPriceDisplay() {
      const totalPriceDisplay = document.getElementById('totalPrice');
      totalPriceDisplay.textContent = getTotalPrice().toFixed(2); // Display total price with two decimal places
  }

  function getTotalPrice() {
      let totalPrice = 0;
      for (const foodId in quantities) {
          totalPrice += quantities[foodId].quantity * quantities[foodId].price;
      }
      return totalPrice;
  }
  
  function updateLocalStorage() {
      localStorage.setItem('quantities', JSON.stringify(quantities));
  }
</script>

<script>
  function submitOrderForm(){
    const storedItems = localStorage.getItem('quantities');
        const items = storedItems ? JSON.parse(storedItems) : {};
        var datas=JSON.stringify(items);
    document.querySelector('#order_data').value=datas;
    document.querySelector('#form_view_order').submit();
  }

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
