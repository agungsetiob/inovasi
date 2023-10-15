<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.title', 'dr. H. Andi Abdurrahman Noor') }}</title>
    <link
      rel="shortcut icon"
      href="{{url ('storage/logors.png')}}"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}" />
    <link rel="stylesheet" href="{{ asset ('css/tailwind.css') }}" />
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

    <!-- BEGIN SHAREAHOLIC CODE -->
    <link rel="preload" href="https://cdn.shareaholic.net/assets/pub/shareaholic.js" as="script" />
    <meta name="shareaholic:site_id" content="8edb0b0f5ff6843927256e59b7f5b82c" />
    <script data-cfasync="false" async src="https://cdn.shareaholic.net/assets/pub/shareaholic.js"></script>
<!-- END SHAREAHOLIC CODE -->

    <!-- ==== WOW JS ==== -->
    <script src="{{ asset ('js/wow.min.js') }}"></script>
    <script>
      new WOW().init();
    </script>
  </head>
  <body>
    <!-- ====== Navbar Section Start -->
    <div
      class="
        ud-header
        bg-transparent
        absolute
        top-0
        left-0
        z-40
        w-full
        flex
        items-center
      "
    >
      <div class="container">
        <div class="flex -mx-4 items-center justify-between relative">
          <div class="px-4 w-24 max-w-full">
            <a href=" {{url('/') }} " class="navbar-logo w-full block py-5">
              <img 
                src="{{url ('storage/logors.png')}}"
                alt="logo"
                class="w-20 header-logo "
              />
            </a>
          </div>
          <div class="flex px-4 justify-between items-center w-full">
            <div>
              <button
                id="navbarToggler"
                class="
                  block
                  absolute
                  right-4
                  top-1/2
                  -translate-y-1/2
                  lg:hidden
                  focus:ring-2
                  ring-primary
                  px-3
                  py-[6px]
                  rounded-lg
                "
              >
                <span
                  class="relative w-[30px] h-[2px] my-[6px] block bg-white"
                ></span>
                <span
                  class="relative w-[30px] h-[2px] my-[6px] block bg-white"
                ></span>
                <span
                  class="relative w-[30px] h-[2px] my-[6px] block bg-white"
                ></span>
              </button>
              <nav
                id="navbarCollapse"
                class="
                  absolute
                  py-5
                  lg:py-0 lg:px-4
                  xl:px-6
                  bg-white
                  lg:bg-transparent
                  shadow-lg
                  rounded-lg
                  max-w-[250px]
                  w-full
                  lg:max-w-full lg:w-full
                  right-4
                  top-full
                  hidden
                  lg:block lg:static lg:shadow-none
                "
              >
                <ul class="block lg:flex">
                  @if (Auth::guest())
                  <li class="relative group">
                    <a
                      href="{{url('login')}}"
                      class="
                        text-base text-dark
                        lg:text-white
                        lg:group-hover:opacity-70
                        lg:group-hover:text-white
                        group-hover:text-primary
                        py-2
                        lg:py-6 lg:inline-flex lg:px-0
                        flex
                        mx-8
                        lg:mr-0
                        lg:hidden
                      "
                    >
                      Masuk
                    </a>
                  </li>
                  <li class="relative group">
                    <a
                      href="{{url('user-register')}}"
                      class="
                        text-base text-dark
                        lg:text-white
                        lg:group-hover:opacity-70
                        lg:group-hover:text-white
                        group-hover:text-primary
                        py-2
                        lg:py-6 lg:inline-flex lg:px-0
                        flex
                        mx-8
                        lg:mr-0
                        lg:hidden
                      "
                    >
                      Daftar
                    </a>
                  </li>
                  @elseif (Auth::user())
                  <li class="relative group">
                    <a
                      href="#"
                      class="
                        text-base text-dark
                        lg:text-white
                        lg:group-hover:opacity-70
                        lg:group-hover:text-white
                        group-hover:text-primary
                        py-2
                        lg:py-6 lg:inline-flex lg:px-0
                        flex
                        mx-8
                        lg:mr-0
                        lg:hidden
                      "
                    >
                      Hi {{Auth::user()->username}}
                    </a>
                    <div
                      class="
                        submenu
                        relative
                        lg:absolute
                        w-[250px]
                        top-full
                        lg:top-[110%]
                        left-0
                        rounded-sm
                        lg:shadow-lg
                        p-4
                        lg:block lg:opacity-0 lg:invisible
                        group-hover:opacity-100
                        lg:group-hover:visible lg:group-hover:top-full
                        bg-white
                        transition-[top]
                        duration-300
                      "
                    >
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                        class="
                          block
                          text-sm text-body-color
                          rounded
                          hover:text-primary
                          py-[10px]
                          px-4
                        ">
                        Logout
                        </button>
                    </form>
                      <a href="{{url('posts/create')}}"
                      class="
                          block
                          text-sm text-body-color
                          rounded
                          hover:text-primary
                          py-[10px]
                          px-4">
                          Create post  
                      </a>
                    </div>
                  </li>
                  @endif
                  <li class="relative group">
                    <a
                      href="#home"
                      class="
                        ud-menu-scroll
                        text-base text-dark
                        lg:text-white
                        lg:group-hover:opacity-70
                        lg:group-hover:text-white
                        group-hover:text-primary
                        py-2
                        lg:py-6 lg:inline-flex lg:px-0
                        flex
                        mx-8
                        lg:mr-0
                      "
                    >
                      Beranda
                    </a>
                  </li>
                  <li class="relative group">
                    <a
                      href="#about"
                      class="
                        ud-menu-scroll
                        text-base text-dark
                        lg:text-white
                        lg:group-hover:opacity-70
                        lg:group-hover:text-white
                        group-hover:text-primary
                        py-2
                        lg:py-6 lg:inline-flex lg:px-0
                        flex
                        mx-8
                        lg:mr-0 lg:ml-7
                        xl:ml-12
                      "
                    >
                      Profil
                    </a>
                  </li>
                  <li class="relative group">
                    <a
                      href="#faq"
                      class="
                        ud-menu-scroll
                        text-base text-dark
                        lg:text-white
                        lg:group-hover:opacity-70
                        lg:group-hover:text-white
                        group-hover:text-primary
                        py-2
                        lg:py-6 lg:inline-flex lg:px-0
                        flex
                        mx-8
                        lg:mr-0 lg:ml-7
                        xl:ml-12
                      "
                    >
                      FAQ
                    </a>
                  </li>
                  <li class="relative group">
                    <a
                      href="#doctors"
                      class="
                        ud-menu-scroll
                        text-base text-dark
                        lg:text-white
                        lg:group-hover:opacity-70
                        lg:group-hover:text-white
                        group-hover:text-primary
                        py-2
                        lg:py-6 lg:inline-flex lg:px-0
                        flex
                        mx-8
                        lg:mr-0 lg:ml-7
                        xl:ml-12
                      "
                    >
                      Dokter Kami
                    </a>
                  </li>
                  <li class="relative group">
                    <a
                      href="#contact"
                      class="
                        ud-menu-scroll
                        text-base text-dark
                        lg:text-white
                        lg:group-hover:opacity-70
                        lg:group-hover:text-white
                        group-hover:text-primary
                        py-2
                        lg:py-6 lg:inline-flex lg:px-0
                        flex
                        mx-8
                        lg:mr-0 lg:ml-7
                        xl:ml-12
                      "
                    >
                      Kontak
                    </a>
                  </li>
                  <li class="relative group submenu-item">
                    <a
                      href="javascript:void(0)"
                      class="
                        text-base text-dark
                        lg:text-white
                        lg:group-hover:opacity-70
                        lg:group-hover:text-white
                        group-hover:text-primary
                        py-2
                        lg:py-6 lg:inline-flex lg:pl-0 lg:pr-4
                        flex
                        mx-8
                        lg:mr-0 lg:ml-8
                        xl:ml-12
                        relative
                        after:absolute
                        after:w-2
                        after:h-2
                        after:border-b-2
                        after:border-r-2
                        after:border-current
                        after:rotate-45
                        lg:after:right-0
                        after:right-1
                        after:top-1/2
                        after:-translate-y-1/2
                        after:mt-[-2px]
                      "
                    >
                      Pages
                    </a>
                    <div
                      class="
                        submenu
                        hidden
                        relative
                        lg:absolute
                        w-[250px]
                        top-full
                        lg:top-[110%]
                        left-0
                        rounded-sm
                        lg:shadow-lg
                        p-4
                        lg:block lg:opacity-0 lg:invisible
                        group-hover:opacity-100
                        lg:group-hover:visible lg:group-hover:top-full
                        bg-white
                        transition-[top]
                        duration-300
                      "
                    >
                      <a
                        href="{{ url('quran') }}"
                        class="
                          block
                          text-sm text-body-color
                          rounded
                          hover:text-primary
                          py-[10px]
                          px-4
                        "
                        target="_blank"
                      >
                        Al-Qur'an Digital
                      </a>
                      <a
                        href="{{ url('blog') }}"
                        class="
                          block
                          text-sm text-body-color
                          rounded
                          hover:text-primary
                          py-[10px]
                          px-4
                        "
                      >
                        Blog
                      </a>
                      <a
                        href="{{url('standar-pelayanan')}}"
                        class="
                          block
                          text-sm text-body-color
                          rounded
                          hover:text-primary
                          py-[10px]
                          px-4
                        "
                      >
                        Standar Pelayanan
                      </a>
                      <a
                        href="{{url('blog/layanan-kami')}}"
                        class="
                          block
                          text-sm text-body-color
                          rounded
                          hover:text-primary
                          py-[10px]
                          px-4
                        "
                      >
                        Layanan Kami
                      </a>
                      <a
                        href="{{url('blog/category/skm')}}"
                        class="
                          block
                          text-sm text-body-color
                          rounded
                          hover:text-primary
                          py-[10px]
                          px-4
                        "
                      >
                        Survey Kepuasan Masyarakat
                      </a>
                      <a
                        href="{{ route('docs') }}"
                        class="
                          block
                          text-sm text-body-color
                          rounded
                          hover:text-primary
                          py-[10px]
                          px-4
                        "
                      >
                        Dokumen Publik
                      </a>
                      <a
                        href="{{ url('leaderboard') }}"
                        class="
                          block
                          text-sm text-body-color
                          rounded
                          hover:text-primary
                          py-[10px]
                          px-4
                        "
                      >
                        Top Author
                      </a>
                    </div>
                  </li>
                </ul>
              </nav>
            </div>
            @if (Auth::guest())
            <div class="sm:flex justify-end hidden pr-16 lg:pr-0">
              <a
                href=" {{route('login')}} "
                class="
                  text-base
                  font-medium
                  text-white
                  hover:opacity-70
                  py-3
                  px-7
                  loginBtn
                "
              >
                Masuk
              </a>
              <a
                href=" {{route('user-register')}} "
                class="
                  text-base
                  font-medium
                  text-white
                  bg-white bg-opacity-20
                  rounded-lg
                  py-3
                  px-6
                  hover:bg-opacity-100 hover:text-dark
                  signUpBtn
                  duration-300
                  ease-in-out
                  sm:visible
                "
              >
                Daftar
              </a>
            </div>
            @elseif (Auth::user())
            <div class="sm:flex justify-end hidden pr-16 lg:pr-0">
              <ul class="blcok lg:flex">
                <li class="relative group submenu-item">
                    <a
                      href="javascript:void(0)"
                      class="
                        text-base
                        lg:text-body-color
                        lg:group-hover:opacity-70
                        group-hover:text-primary
                        py-2
                        lg:py-6 lg:inline-flex lg:pl-0 lg:pr-4
                        flex
                        mx-8
                        lg:mr-0 lg:ml-8
                        xl:ml-12
                        relative
                        after:rotate-45
                        lg:after:right-0
                        after:top-1/2
                        after:-translate-y-1/2
                      "
                    >
                      Hi {{Auth::user()->name}}
                    </a><i class="fa fa-caret-down"></i>
                    <div
                      class="
                        submenu
                        hidden
                        relative
                        lg:absolute
                        w-[250px]
                        top-full
                        lg:top-[110%]
                        left-0
                        rounded-sm
                        lg:shadow-lg
                        p-4
                        lg:block lg:opacity-0 lg:invisible
                        group-hover:opacity-100
                        lg:group-hover:visible lg:group-hover:top-full
                        bg-white
                        transition-[top]
                        duration-300
                      "
                    >
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                        class="
                          block
                          text-sm text-body-color
                          rounded
                          hover:text-primary
                          py-[10px]
                          px-4
                        ">
                        <i class="fa fa-sign-out-alt"></i>
                        Logout
                        </button>
                    </form>
                    <a href="{{url('posts/create')}}"
                      class="
                          block
                          text-sm text-body-color
                          rounded
                          hover:text-primary
                          py-[10px]
                          px-4">
                          <i class="fa fa-pencil-alt"></i>
                          Create post  
                    </a>
                    </div>
                  </li>
                </ul>
            </div>
            @endif

          </div>
        </div>
      </div>
    </div>
    <!-- ====== Navbar Section End -->
    @yield ('content')
    <!-- ====== Footer Section End -->
