
<x-starter-layout>
	<x-slot name='title'>New Order </x-slot>
    <x-side-drawer>
        
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
        <section
        class="w-[1267px] flex flex-col items-start justify-start gap-[16px] max-w-full text-left text-base text-orange-500 font-leading-tight-text-sm-font-normal"
      >
        <h3
          class="m-0 w-[1070px] relative text-[24px] leading-[150%] text-gray-900 inline-block max-w-full font-inherit mq450:text-[19px] mq450:leading-[29px]"
        >
          <b>Orders</b>
          <span class="font-medium">(2)</span>
        </h3>
@foreach ( $orders as $order)
    
     <div
     class="self-stretch rounded-6xs bg-white flex flex-col items-start justify-start p-4 box-border gap-[8px] max-w-full"
   >
     <div
       class="self-stretch flex flex-row items-start justify-start max-w-full text-gray-900"
     >
       <div
         class="w-[1235px] flex flex-col items-start justify-start gap-[8px] max-w-full"
       >
         <i
           class="w-[612.5px] relative leading-[150%] inline-block font-medium max-w-full"
           >Order No.#{{$order->id}}</i
         >
         <b class="self-stretch relative text-lg leading-[150%]">
           <span>At </span>
           <span class="text-orange-500">Table {{$order->table->table_name}}</span>
         </b>
       </div>
       <div
         class="w-[612.5px] relative leading-[150%] font-medium text-right inline-block max-w-full ml-[-612.5px]"
       >
       {{$order->created_at}}
       </div>
     </div>
     {{-- hahhdac --}}


     @foreach($orderDetails->where('order_id', $order->id) as $orderDetail)
     <div
     class="self-stretch rounded-6xs flex flex-row flex-wrap items-start justify-start pt-3 pb-4 pr-0.5 pl-0 box-border relative gap-[8px_6px] max-w-full"
 >
     <img
     class="h-[72px] w-[72px] relative rounded-6xs overflow-hidden shrink-0 object-cover"
     loading="lazy"
     alt="No img"
     src="{{$orderDetail->food->image_link}}"
     />

     <div
     class="flex-1 flex flex-row items-center justify-between min-w-[462px] max-w-full gap-[20px] mq450:flex-wrap"
     >
     <div
         class="flex flex-row items-center justify-start gap-[12px]"
     >
         <div class="flex flex-row items-end justify-end gap-[4px]">
         <div
             class="relative leading-[125%] font-semibold inline-block min-w-[8px]"
         >
             {{$orderDetail->quantity}}
         </div>
         <div
             class="relative leading-[-7.3px] font-semibold inline-block min-w-[9px]"
         >
             x
         </div>
         </div>
         <div
         class="relative leading-[125%] font-medium text-gray-900 inline-block min-w-[118px]"
         >
         {{$orderDetail->food->food_name}}
         </div>
     </div>
     <div
         class="flex flex-row items-end justify-end gap-[4px] text-xs text-gray-700"
     >
         <div class="flex flex-row items-end justify-end gap-[4px]">
         <div
             class="relative leading-[125%] font-medium inline-block min-w-[6px]"
         >
         {{$orderDetail->quantity}}
         </div>
         <div
             class="relative leading-[-5.5px] font-medium inline-block min-w-[7px]"
         >
             x
         </div>
         </div>
         <div
         class="relative leading-[125%] font-medium inline-block min-w-[41px]"
         >
         {{$orderDetail->food_price}}
         </div>
     </div>
     <div
         class="flex flex-row items-end justify-end gap-[4px] text-gray-900"
     >
         <div
         class="relative leading-[125%] font-semibold inline-block min-w-[24px]"
         >
         Rs.
         </div>
         <div
         class="relative leading-[125%] font-semibold inline-block min-w-[55px]"
         >
         {{$orderDetail->food_price * $orderDetail->quantity}}
         </div>
     </div>
     </div>
     <div
     class="h-0.5 w-[1038px] absolute !m-[0] bottom-[0px] left-[0px] bg-gray-200 hidden z-[2]"
     ></div>
 </div>
 <div class="self-stretch h-0.5 relative bg-gray-200"></div>
 
@endforeach

     <div
       class="flex flex-row items-end justify-end py-0 pr-0 pl-[833px] gap-[19px] text-lg mq1250:flex-wrap mq1250:pl-[416px] mq1250:box-border mq450:pl-5 mq450:box-border mq750:pl-52 mq750:box-border"
     >
       <div class="flex flex-row items-end justify-end gap-[4px]">
         <div
           class="relative text-sm leading-[18px] font-semibold text-grays-black inline-block min-w-[38px]"
         >
           Total:
         </div>
         <div
           class="relative leading-[23px] font-semibold inline-block min-w-[27px]"
         >
           Rs.
         </div>
         <div
           class="relative leading-[23px] font-semibold inline-block min-w-[63px]"
         >
         {{$order->total_amount}}
         </div>
       </div>
       <div class="flex flex-row items-center justify-center gap-[8px]">
         <button
           class="cursor-pointer [border:none] py-2.5 px-3 bg-red-600 rounded-6xs flex flex-row items-start justify-start whitespace-nowrap hover:bg-tomato"
         >
           <div
             class="w-[92px] relative text-sm leading-[18px] font-medium font-leading-tight-text-sm-font-normal text-white text-center flex items-center justify-center min-w-[92px]"
           >
             Decline Order
           </div>
         </button>
         <button
           class="cursor-pointer [border:none] py-2.5 px-3 bg-green-500 rounded-6xs flex flex-row items-start justify-start whitespace-nowrap hover:bg-mediumseagreen"
         >
           <div
             class="w-[99px] relative text-sm leading-[18px] font-medium font-leading-tight-text-sm-font-normal text-white text-center flex items-center justify-center min-w-[99px]"
           >
             Approve Order
           </div>
         </button>
       </div>
     </div>
   </div>
</section>
@endforeach

    




    
    <script>
        function confirmDelete(foodId) {
            Swal.fire({
                title: 'Are you sure you want to delete this user?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm'+foodId).submit();
                }
            });
        }
    </script>
    </x-side-drawer>
</x-starter-layout>
