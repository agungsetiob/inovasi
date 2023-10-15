@include ('layouts.header-page')
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
              <h1 class="font-semibold text-white text-4xl">Frequently Asked Question</h1>
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

    <!-- ====== Faq Section Start -->
    <section
      id="faq"
      class="
        bg-[#f3f4ff]
        pt-20
        lg:pt-[120px]
        pb-12
        lg:pb-[90px]
        relative
        z-20
        overflow-hidden
      "
    >
      <div class="container">
        <div class="flex flex-wrap -mx-4 justify-center">
          @forelse ($faqs as $faq)
          <div class="w-full lg:w-1/2 px-4"> 
            <div
              class="
                single-faq
                w-full
                bg-white
                border border-[#F3F4FE]
                rounded-lg
                p-5
                sm:p-8
                mb-8
                wow
                fadeInUp
              "
              data-wow-delay=".1s
              "
            >
              <button class="faq-btn flex items-center w-full text-left">
                <div
                  class="
                    w-full
                    max-w-[40px]
                    h-10
                    flex
                    items-center
                    justify-center
                    rounded-lg
                    bg-primary
                    text-primary
                    bg-opacity-5
                    mr-5
                  "
                >
                  <svg
                    width="17"
                    height="10"
                    viewBox="0 0 17 10"
                    class="fill-current icon"
                  >
                    <path
                      d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                      fill="#3056D3"
                      stroke="#3056D3"
                    />
                  </svg>
                </div>
                <div class="w-full">
                  <h4 class="text-base sm:text-lg font-semibold text-black">
                    {{$faq->question}}
                  </h4>
                </div>
              </button>
              <div class="faq-content pl-[62px] hidden">
                <p class="text-base text-body-color leading-relaxed py-3">
                  {{$faq->answer}}
                </p>
              </div>
            </div>
            </div>
            @empty
              <div class="text-center border border-red text-red px-4 py-3 rounded relative">
                Data belum Tersedia.
              </div>
            @endforelse

        </div>
      </div>

      <div class="absolute bottom-0 right-0 z-[-1]">
        <svg
          width="1440"
          height="886"
          viewBox="0 0 1440 886"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            opacity="0.5"
            d="M193.307 -273.321L1480.87 1014.24L1121.85 1373.26C1121.85 1373.26 731.745 983.231 478.513 729.927C225.976 477.317 -165.714 85.6993 -165.714 85.6993L193.307 -273.321Z"
            fill="url(#paint0_linear)"
          />
          <defs>
            <linearGradient
              id="paint0_linear"
              x1="1308.65"
              y1="1142.58"
              x2="602.827"
              y2="-418.681"
              gradientUnits="userSpaceOnUse"
            >
              <stop stop-color="#3056D3" stop-opacity="0.36" />
              <stop offset="1" stop-color="#F5F2FD" stop-opacity="0" />
              <stop offset="1" stop-color="#F5F2FD" stop-opacity="0.096144" />
            </linearGradient>
          </defs>
        </svg>
      </div>
    </section>
    <!-- ====== Faq Section End -->

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
          <div class="flex flex-wrap justify-center -mx-4">
            <div class="w-full md:w-2/3 lg:w-1/2 px-4">
              <div class="my-1">
                <div
                  class="
                    flex
                    justify-center
                    -mx-3
                  "
                >
                  <p class="text-base text-[#f3f4fe]">
                  Developed by
                  <a
                    href="javascript:void(0)"
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
