@extends('layouts.frontend.master')

@section('title')
    {{ __($pageTitle) }}
@endsection

@section('content')
    <div class="main-container contact-page">
    <x-banner :banner-title="$bannerTitle"></x-banner>
       
        <section class="contact-us section-padding add-to-cart">
        <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                        <h3 class="text-3xl text-bold list">Cart List</h3>
                      <div class="flex-1">
                        <table class="carttable" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase">
                              
                              <th class="text-left">Name</th>
                              <th class="pl-5 text-left lg:text-right lg:pl-0">
                                
                                <span class="hidden lg:inline">Quantity</span>
                              </th>
                              <th class="hidden text-right md:table-cell"> price</th>
                              <th class="hidden text-right md:table-cell"> Remove </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            //  dd($cartItems['id']);
                             ?>
                           
                              @foreach($cartItems as $item)
                            <tr>
                                <?php
                                // dd($item->id);
                                ?>
                              
                                <a href="#">
                                 
                                </a>
                              </td>
                              <td>
                                <a href="#">
                                  <p class="mb-2 md:ml-4">{{ $item['name'] }}</p>
                                  
                                </a>
                              </td>
                              <td class="justify-center mt-6 md:justify-end md:flex">
                                <div class="h-10 w-28">
                                  <div class="relative flex flex-row w-full h-8">
                                    
                                    <form id="quantityform" action="{{ route('front.cart.update' , ['id' => $item->id]) }}" method="POST">
                                      @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" 
                                    class="w-6 text-center bg-gray-300" />
                                    <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">update</button>
                                    </form>
                                  </div>
                                </div>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    ${{ $item['price'] }}
                                </span>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <form id="cancelform" action="{{ route('front.cart.remove' ,['id' => $item->id]) }}" method="POST">
                                  @csrf
                                 
                                  <button class="px-4 py-2 text-white bg-red-600">x</button>
                              </form>
                                
                              </td>
                            </tr>
                            @endforeach
                             
                          </tbody>
                        </table>
                        <div class="totalbox">
                            <div class="inner">
                        <div>
                         Total: ${{ Cart::getTotal() }}
                        </div>
                        <div>
                          <form action="{{ route('front.cart.clear') }}" method="POST">
                            @csrf
                            <button class="px-6 py-2 text-red-800 bg-red-300">Remove All Cart</button>
                          </form>
                        </div></div>
                        </div>

                      </div>
                    </div>
                  </div>
            </div>
        </main>
        </section>
        <x-footer />
    </div>
    @endsection