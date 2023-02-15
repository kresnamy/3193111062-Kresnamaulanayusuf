 <!-- Offcanvas Menu Begin -->
 <div class="offcanvas-menu-overlay"></div>
 <div class="offcanvas-menu-wrapper" style="background-color: rgb(255, 230, 215)">
     <div class="offcanvas__close">+</div>
     <ul class="offcanvas__widget">
         <li><span class="icon_search search-switch"></span></li>
         <li><a href="#"><span class="icon_bag_alt"></span>
             <div class="tip">2</div>
         </a></li>
     </ul>
     <div class="offcanvas__logo">
         <a href="{{ url('/') }}"><img src="{{ asset('ashion') }}/img/logo.png" alt=""></a>
     </div>
     <div id="mobile-menu-wrap"></div>
 </div>
 <!-- Offcanvas Menu End -->

 <!-- Header Section Begin -->
 <header class="header" style="background-color: #C669EC ">
     <div class="container-fluid">
         <div class="row">
             <div class="col-xl-3 col-lg-2">
                 <div class="">
                     <h2 class="title-logo mt-3" style="font-size: 330%; font-family: cursive;">MegumiKidsWear</h2>
                 </div>
             </div>
             <div class="col-xl-6 col-lg-7 text-center">
                 <nav class="header__menu">
                     <ul>
                         <li class="{{ request()->is('/') ? 'active' : '' }}">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                         <li class="{{ request()->is('product*') ? 'active' : '' }}">
                            <a href="{{ route('product.index') }}">Produk</a>
                        </li>
                        <li class="{{ request()->is('category*') ? 'active' : '' }}">
                            <a href="{{ route('category.index') }}">Kategori</a>
                        </li>
                        <li class="{{ request()->is('kontak*') ? 'active' : '' }}">
                            <a href="{{ route('kontak.indek') }}">Kontak</a>
                        </li>
                        @auth
                        <li class="{{ request()->is('kontak*') ? 'active' : '' }}"><a href="#"><i class="fa fa-angle-down"></i> {{ auth()->user()->name }}</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('transaction.index') }}">Riwayat Belanja</a></li>
                                <li><a href="{{ route('retur') }}">Pengembalian</a></li>
                                {{-- <li><a href="{{ route('account.index') }}">Pengaturan Akun</a></li> --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li>
                                        <a href="{{ route('logout')  }}" onclick="event.preventDefault();
                                        this.closest('form').submit();" > Logout
                                        </a>
                                    </li>
                                </form>
                            </ul>
                        </li>
                             @else
                             <li><a href="{{ route('login') }}">Login</a></li>
                         @endauth
                     </ul>
                 </nav>
             </div>
             <div class="col-lg-3">
                 <div class="header__right">
                     <ul class="header__right__widget">
                         <li><span class="icon_search search-switch"></span></li>
                         <li><a href="{{ route('cart.index') }}"><span class="icon_bag_alt"></span>
                             <div class="tip">
                                 {{ $totalCart ?? 0 }}
                             </div>
                         </a></li>
                     </ul>
                 </div>
             </div>
         </div>
         <div class="canvas__open">
             <i class="fa fa-bars"></i>
         </div>
     </div>
 </header>
 <!-- Header Section End -->