@include ('layouts.header-page')
<link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
@section ('content')

    <!-- ====== Banner Section Start -->
    <div
      class="
        relative
        z-10
        pt-20
        md:pt-[120px]
        lg:pt-[120px]
        pb-10
        bg-secondary
        overflow-hidden
      "
    >
      <div class="container">
        <div class="flex flex-wrap items-center -mx-4">
          <div class="w-full px-4">
            <div class="text-center">
              <h1 class="font-semibold text-white text-4xl">Leaderboard</h1>
            </div>
          </div>
        </div>
      </div>
      <div>
        <span class="absolute top-0 left-0 z-[-1]">
          <svg
            width="495"
            height="470"
            viewBox="0 0 495 470"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <circle
              cx="55"
              cy="442"
              r="138"
              stroke="white"
              stroke-opacity="0.04"
              stroke-width="50"
            />
            <circle
              cx="446"
              r="39"
              stroke="white"
              stroke-opacity="0.04"
              stroke-width="20"
            />
            <path
              d="M245.406 137.609L233.985 94.9852L276.609 106.406L245.406 137.609Z"
              stroke="white"
              stroke-opacity="0.08"
              stroke-width="12"
            />
          </svg>
        </span>
        <span class="absolute top-0 right-0 z-[-1]">
          <svg
            width="493"
            height="470"
            viewBox="0 0 493 470"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <circle
              cx="462"
              cy="5"
              r="138"
              stroke="white"
              stroke-opacity="0.04"
              stroke-width="50"
            />
            <circle
              cx="49"
              cy="470"
              r="39"
              stroke="white"
              stroke-opacity="0.04"
              stroke-width="20"
            />
            <path
              d="M222.393 226.701L272.808 213.192L259.299 263.607L222.393 226.701Z"
              stroke="white"
              stroke-opacity="0.06"
              stroke-width="13"
            />
          </svg>
        </span>
      </div>
    </div>
    <!-- ====== Banner Section End -->

    <!-- ====== Team Section Start -->
    <section id="team" class="pt-20 lg:pt-[120px] pb-10 lg:pb-20">
      <div class="container">

        <div class="flex flex-wrap justify-center -mx-4">
          @forelse ($ranks as $rank)
          <div class="w-full sm:w-1/2 lg:w-1/4 px-4">
            <div class="mb-10 wow fadeInUp" data-wow-delay=".1s">
              <div
                class="
                  relative
                  w-[170px]
                  h-170px]
                  rounded-full
                  z-10
                  mx-auto
                  mb-6
                "
              >
                @if($rank->avatar)
                <img
                  src="{{url('storage/ava/', $rank->avatar)}}"
                  alt="image"
                  class="w-full rounded-full"
                />
                @else
                <img
                  src="{{url('storage/ava/logors.png')}}"
                  alt="image"
                  class="w-full rounded-full"
                />
                @endif
                <span class="absolute top-0 left-0 z-[-1]">
                  <svg
                    width="71"
                    height="82"
                    viewBox="0 0 71 82"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <circle
                      cx="1.29337"
                      cy="80.7066"
                      r="1.29337"
                      transform="rotate(-90 1.29337 80.7066)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="12.6747"
                      cy="80.7066"
                      r="1.29337"
                      transform="rotate(-90 12.6747 80.7066)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="24.0575"
                      cy="80.7066"
                      r="1.29337"
                      transform="rotate(-90 24.0575 80.7066)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="35.4379"
                      cy="80.7066"
                      r="1.29337"
                      transform="rotate(-90 35.4379 80.7066)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="46.8197"
                      cy="80.7066"
                      r="1.29337"
                      transform="rotate(-90 46.8197 80.7066)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="68.807"
                      cy="80.7066"
                      r="1.29337"
                      transform="rotate(-90 68.807 80.7066)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="57.9443"
                      cy="80.7066"
                      r="1.29337"
                      transform="rotate(-90 57.9443 80.7066)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="1.29337"
                      cy="69.3249"
                      r="1.29337"
                      transform="rotate(-90 1.29337 69.3249)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="12.6747"
                      cy="69.3249"
                      r="1.29337"
                      transform="rotate(-90 12.6747 69.3249)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="24.0575"
                      cy="69.3249"
                      r="1.29337"
                      transform="rotate(-90 24.0575 69.3249)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="35.4379"
                      cy="69.3249"
                      r="1.29337"
                      transform="rotate(-90 35.4379 69.3249)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="46.8197"
                      cy="69.325"
                      r="1.29337"
                      transform="rotate(-90 46.8197 69.325)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="68.807"
                      cy="69.325"
                      r="1.29337"
                      transform="rotate(-90 68.807 69.325)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="57.9433"
                      cy="69.325"
                      r="1.29337"
                      transform="rotate(-90 57.9433 69.325)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="1.29337"
                      cy="57.9433"
                      r="1.29337"
                      transform="rotate(-90 1.29337 57.9433)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="1.29337"
                      cy="24.0568"
                      r="1.29337"
                      transform="rotate(-90 1.29337 24.0568)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="12.6747"
                      cy="57.9433"
                      r="1.29337"
                      transform="rotate(-90 12.6747 57.9433)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="12.6747"
                      cy="24.0568"
                      r="1.29337"
                      transform="rotate(-90 12.6747 24.0568)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="24.0575"
                      cy="57.9433"
                      r="1.29337"
                      transform="rotate(-90 24.0575 57.9433)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="24.0575"
                      cy="24.0568"
                      r="1.29337"
                      transform="rotate(-90 24.0575 24.0568)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="35.4379"
                      cy="57.9433"
                      r="1.29337"
                      transform="rotate(-90 35.4379 57.9433)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="35.4379"
                      cy="24.0568"
                      r="1.29337"
                      transform="rotate(-90 35.4379 24.0568)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="46.8197"
                      cy="57.9431"
                      r="1.29337"
                      transform="rotate(-90 46.8197 57.9431)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="46.8197"
                      cy="24.0567"
                      r="1.29337"
                      transform="rotate(-90 46.8197 24.0567)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="68.807"
                      cy="57.9431"
                      r="1.29337"
                      transform="rotate(-90 68.807 57.9431)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="68.807"
                      cy="24.0567"
                      r="1.29337"
                      transform="rotate(-90 68.807 24.0567)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="57.9433"
                      cy="57.9431"
                      r="1.29337"
                      transform="rotate(-90 57.9433 57.9431)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="57.9443"
                      cy="24.0567"
                      r="1.29337"
                      transform="rotate(-90 57.9443 24.0567)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="1.29337"
                      cy="46.5615"
                      r="1.29337"
                      transform="rotate(-90 1.29337 46.5615)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="1.29337"
                      cy="12.6751"
                      r="1.29337"
                      transform="rotate(-90 1.29337 12.6751)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="12.6747"
                      cy="46.5615"
                      r="1.29337"
                      transform="rotate(-90 12.6747 46.5615)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="12.6747"
                      cy="12.6751"
                      r="1.29337"
                      transform="rotate(-90 12.6747 12.6751)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="24.0575"
                      cy="46.5615"
                      r="1.29337"
                      transform="rotate(-90 24.0575 46.5615)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="24.0575"
                      cy="12.6751"
                      r="1.29337"
                      transform="rotate(-90 24.0575 12.6751)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="35.4379"
                      cy="46.5615"
                      r="1.29337"
                      transform="rotate(-90 35.4379 46.5615)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="35.4379"
                      cy="12.6751"
                      r="1.29337"
                      transform="rotate(-90 35.4379 12.6751)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="46.8197"
                      cy="46.5615"
                      r="1.29337"
                      transform="rotate(-90 46.8197 46.5615)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="46.8197"
                      cy="12.6751"
                      r="1.29337"
                      transform="rotate(-90 46.8197 12.6751)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="68.807"
                      cy="46.5615"
                      r="1.29337"
                      transform="rotate(-90 68.807 46.5615)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="68.807"
                      cy="12.6751"
                      r="1.29337"
                      transform="rotate(-90 68.807 12.6751)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="57.9433"
                      cy="46.5615"
                      r="1.29337"
                      transform="rotate(-90 57.9433 46.5615)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="57.9443"
                      cy="12.6751"
                      r="1.29337"
                      transform="rotate(-90 57.9443 12.6751)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="1.29337"
                      cy="35.1798"
                      r="1.29337"
                      transform="rotate(-90 1.29337 35.1798)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="1.29337"
                      cy="1.2933"
                      r="1.29337"
                      transform="rotate(-90 1.29337 1.2933)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="12.6747"
                      cy="35.1798"
                      r="1.29337"
                      transform="rotate(-90 12.6747 35.1798)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="12.6747"
                      cy="1.2933"
                      r="1.29337"
                      transform="rotate(-90 12.6747 1.2933)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="24.0575"
                      cy="35.1798"
                      r="1.29337"
                      transform="rotate(-90 24.0575 35.1798)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="24.0575"
                      cy="1.29336"
                      r="1.29337"
                      transform="rotate(-90 24.0575 1.29336)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="35.4379"
                      cy="35.1798"
                      r="1.29337"
                      transform="rotate(-90 35.4379 35.1798)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="35.4379"
                      cy="1.29336"
                      r="1.29337"
                      transform="rotate(-90 35.4379 1.29336)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="46.8197"
                      cy="35.18"
                      r="1.29337"
                      transform="rotate(-90 46.8197 35.18)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="46.8197"
                      cy="1.29354"
                      r="1.29337"
                      transform="rotate(-90 46.8197 1.29354)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="68.807"
                      cy="35.18"
                      r="1.29337"
                      transform="rotate(-90 68.807 35.18)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="68.807"
                      cy="1.29354"
                      r="1.29337"
                      transform="rotate(-90 68.807 1.29354)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="57.9443"
                      cy="35.18"
                      r="1.29337"
                      transform="rotate(-90 57.9443 35.18)"
                      fill="#3056D3"
                    />
                    <circle
                      cx="57.9443"
                      cy="1.29354"
                      r="1.29337"
                      transform="rotate(-90 57.9443 1.29354)"
                      fill="#3056D3"
                    />
                  </svg>
                </span>
                <span class="absolute right-0 bottom-0">
                  <svg
                    width="22"
                    height="22"
                    viewBox="0 0 22 22"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M21.5 21.5L0.505701 21.5C0.767606 10.023 10.023 0.767604 21.5 0.505697L21.5 21.5Z"
                      stroke="#13C296"
                    />
                  </svg>
                </span>
              </div>
              <div class="text-center">
                <h4 class="font-medium text-lg text-dark mb-2">
                  {{$rank->name}} - {{$rank->posts_count}}
                </h4>
                @if ($rank->posts_count == 0)
                <i class="fa fa-plus"></i>
                @elseif ($rank->posts_count < 6)
                <i class="fa fa-star"></i>
                @elseif ($rank->posts_count < 11)
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
                @elseif ($rank->posts_count < 16)
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
                @elseif ($rank->posts_count < 21)
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
                @elseif ($rank->posts_count >= 21)
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
                <i class="fa fa-star star"></i>
                @endif
              </div>
            </div>
          </div>
          @empty
            <div class="border border-red text-red px-4 py-3 rounded relative">
              Data dokter belum Tersedia.
            </div>
          @endforelse
        </div>
        <div class="row">
          <div class="col-md-12">
            {{ $ranks->links('pagination::bootstrap-5') }}
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Team Section End -->
        <!-- ====== Footer Section Start -->
    <footer
      class="bg-secondary pt-20 lg:pt-[10px] relative z-10 wow fadeInUp"
      data-wow-delay=".15s"
    >
      <div class="container">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full sm:w-1/2 md:w-1/2 lg:w-4/12 xl:w-3/12 px-4">
            <div class="w-full mb-10">
              <a
                href="javascript:void(0)"
                class="inline-block max-w-[160px] mb-6"
              >
                <img
                  src="{{url('storage/logors.png')}}"
                  alt="logo"
                  class=".max-w-\[80px\]"
                />
              </a>
              <p class="text-base text-[#f3f4fe] mb-7">
                Senyum Santun Sapa
              </p>
            </div>
          </div>
          <div class="w-full sm:w-1/2 md:w-1/2 lg:w-2/12 xl:w-2/12 px-4">
            <div class="w-full mb-10">
              <h4 class="text-white text-lg font-semibold mb-9">Menu</h4>
              <ul>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="
                      inline-block
                      text-base text-[#f3f4fe]
                      hover:text-primary
                      leading-loose
                      mb-2
                    "
                  >
                    Home
                  </a>
                </li>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="
                      inline-block
                      text-base text-[#f3f4fe]
                      hover:text-primary
                      leading-loose
                      mb-2
                    "
                  >
                    Profil
                  </a>
                </li>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="
                      inline-block
                      text-base text-[#f3f4fe]
                      hover:text-primary
                      leading-loose
                      mb-2
                    "
                  >
                    FAQ
                  </a>
                </li>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="
                      inline-block
                      text-base text-[#f3f4fe]
                      hover:text-primary
                      leading-loose
                      mb-2
                    "
                  >
                    Dokter Kami
                  </a>
                </li>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="
                      inline-block
                      text-base text-[#f3f4fe]
                      hover:text-primary
                      leading-loose
                      mb-2
                    "
                  >
                    Kontak
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="w-full sm:w-1/2 md:w-1/2 lg:w-3/12 xl:w-2/12 px-4">
            <div class="w-full mb-10">
              <h4 class="text-white text-lg font-semibold mb-9">Contact</h4>
              <ul>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="
                      inline-block
                      text-base text-[#f3f4fe]
                      hover:text-primary
                      leading-loose
                      mb-2
                    "
                  >
                    08115040540/
                    (0518)6070767
                  </a>
                </li>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="
                      inline-block
                      text-base text-[#f3f4fe]
                      hover:text-primary
                      leading-loose
                      mb-2
                    "
                  >
                    IGD : (0518) 6070 678
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="w-full sm:w-1/2 md:w-1/2 lg:w-3/12 xl:w-2/12 px-4">
            <div class="w-full mb-10">
              <h4 class="text-white text-lg font-semibold mb-9">
                Address
              </h4>
              <ul>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="
                      inline-block
                      text-base text-[#f3f4fe]
                      hover:text-primary
                      leading-loose
                      mb-2
                    "
                  >
                    Jl. HM. Amin Km.10 RT.03, Desa Sepunggur, Kecamatan Kusan Tengah, Kabupaten Tanah Bumbu
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="w-full md:w-2/3 lg:w-6/12 xl:w-3/12 px-4">
            <div class="w-full mb-10">
              <h4 class="text-white text-lg font-semibold mb-9">Partners</h4>
              <ul class="flex flex-wrap items-center">
                <li>
                  <a
                    href="#"
                    rel="nofollow noopner"
                    target="_blank"
                    class="
                      block
                      mb-6
                      mr-5
                      max-w-[120px]
                      xl:max-w-[100px]
                      2xl:max-w-[120px]
                    "
                  >
                    <img
                      src="{{url('storage/bpjs.png')}}"
                      alt="bpjs kesehatan"
                    />
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    rel="nofollow noopner"
                    target="_blank"
                    class="
                      block
                      mb-6
                      mr-5
                      max-w-[120px]
                      xl:max-w-[100px]
                      2xl:max-w-[120px]
                    "
                  >
                    <img
                      src="{{url('storage/simrs.png')}}"
                      alt="SIMRSGOS"
                      title="SIMRSGOS"
                    />
                  </a>
                </li>

                <li>
                  <a
                    href="https://www.lapor.go.id/"
                    rel="nofollow noopner"
                    target="_blank"
                    class="
                      block
                      mb-6
                      mr-5
                      max-w-[120px]
                      xl:max-w-[100px]
                      2xl:max-w-[120px]
                    "
                  >
                    <img
                      src="{{url('storage/lapor.png')}}"
                      alt="Lapor"
                      title="Lapor"
                    />
                  </a>
                </li>

                <li>
                  <a
                    href="https://sirs.kemkes.go.id/fo/"
                    rel="nofollow noopner"
                    target="_blank"
                    class="
                      block
                      mb-6
                      mr-5
                      max-w-[120px]
                      xl:max-w-[100px]
                      2xl:max-w-[120px]
                    "
                  >
                    <img
                      src="{{url('storage/sirs.png')}}"
                      alt="Sirs Online"
                      title="Sirs Online"
                    />
                  </a>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="border-t border-opacity-40 py-4 mt-12">
        <div class="container">
          <div class="flex flex-wrap -mx-4 justify-center">
            <div class="w-full md:w-2/3 lg:w-1/2 px-4">
              <div class="my-1">
                <div
                  class="
                    flex
                    justify-center
                    -mx-3
                  "
                >
                  <p class="text-base text-[#f3f4fe] text-center">
                  Developed by
                  <a
                    href="#"
                    rel="nofollow noopner"
                    target="_blank"
                    class="text-primary hover:underline"
                  >
                    Om Agung
                  </a>
                </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div>
        <span class="absolute left-0 top-0 z-[-1]">
          <img src="{{url('storage/shape-1.svg')}}" alt="" />
        </span>

        <span class="absolute bottom-0 right-0 z-[-1]">
          <img src="{{url('storage/shape-3.svg')}}" alt="" />
        </span>       
      </div>
    </footer>
    <!-- ====== Back To Top Start -->
    <a
      href="javascript:void(0)"
      class="
        hidden
        items-center
        justify-center
        bg-primary
        text-white
        w-10
        h-10
        rounded-md
        fixed
        bottom-8
        right-8
        left-auto
        z-[999]
        hover:bg-dark
        back-to-top
        shadow-md
        transition
        duration-300
        ease-in-out
      "
    >
      <span
        class="w-3 h-3 border-t border-l border-white rotate-45 mt-[6px]"
      ></span>
    </a>
    <!-- ====== Back To Top End -->
    <!-- ====== All Scripts -->
    <script src="{{url('js/main.js')}}"></script>
  </body>
</html>
