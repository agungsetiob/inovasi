@include ('layouts.header-show')
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
              <h1 class="font-semibold text-white text-4xl">{{$post->title}}</h1>
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

    <!-- ====== Blog Details Section Start -->
    <section class="pt-20">
      <div class="container">
        <div class="flex flex-wrap justify-center -mx-4">
          <div class="w-full px-4">
            <div
              class="
                relative
                rounded
                overflow-hidden
                z-20
                mb-[60px]
                h-[300px]
                md:h-[400px]
                lg:h-[500px]
                wow
                fadeInUp
              "
              data-wow-delay=".1s
              "
            >
              @if ($post->image)
              <img
                src="{{asset ('storage/posts/'. $post->image)}}"
                alt="{{$post->title}}"
                title="{{$post->title}}"
                class="w-full h-full object-cover object-center"
              />
              @else
              <img
                src="{{asset ('storage/posts/putih.jpg')}}"
                alt="{{$post->title}}"
                title="{{$post->title}}"
                class="w-full h-full object-cover object-center"
              />
              @endif
              <div
                class="
                  absolute
                  w-full
                  h-full
                  top-0
                  left-0
                  flex
                  items-end
                  z-10
                  bg-gradient-to-t
                  from-dark-700
                  to-transparent
                "
              >
                <div class="flex flex-wrap items-center p-4 sm:p-8 pb-4">
                  <div class="flex items-center mb-4 mr-5 md:mr-10">
                    <p class="text-base text-white font-medium">
                      By
                      <a
                        href="javascript:void(0)"
                        class="text-white hover:opacity-70"
                      >
                        {{$post->user->name}} as {{$post->user->username}}
                      </a>
                    </p>
                  </div>
                  <div class="flex items-center mb-4">
                    <p
                      class="
                        flex
                        items-center
                        text-sm
                        font-medium
                        text-white
                        mr-5
                        md:mr-8
                      "
                    >
                      <span class="mr-3">
                        <svg
                          width="15"
                          height="15"
                          viewBox="0 0 15 15"
                          class="fill-current"
                        >
                          <path
                            d="M3.8958 8.67529H3.10715C2.96376 8.67529 2.86816 8.77089 2.86816 8.91428V9.67904C2.86816 9.82243 2.96376 9.91802 3.10715 9.91802H3.8958C4.03919 9.91802 4.13479 9.82243 4.13479 9.67904V8.91428C4.13479 8.77089 4.03919 8.67529 3.8958 8.67529Z"
                          />
                          <path
                            d="M6.429 8.67529H5.64035C5.49696 8.67529 5.40137 8.77089 5.40137 8.91428V9.67904C5.40137 9.82243 5.49696 9.91802 5.64035 9.91802H6.429C6.57239 9.91802 6.66799 9.82243 6.66799 9.67904V8.91428C6.66799 8.77089 6.5485 8.67529 6.429 8.67529Z"
                          />
                          <path
                            d="M8.93779 8.67529H8.14914C8.00575 8.67529 7.91016 8.77089 7.91016 8.91428V9.67904C7.91016 9.82243 8.00575 9.91802 8.14914 9.91802H8.93779C9.08118 9.91802 9.17678 9.82243 9.17678 9.67904V8.91428C9.17678 8.77089 9.08118 8.67529 8.93779 8.67529Z"
                          />
                          <path
                            d="M11.472 8.67529H10.6833C10.5399 8.67529 10.4443 8.77089 10.4443 8.91428V9.67904C10.4443 9.82243 10.5399 9.91802 10.6833 9.91802H11.472C11.6154 9.91802 11.711 9.82243 11.711 9.67904V8.91428C11.711 8.77089 11.5915 8.67529 11.472 8.67529Z"
                          />
                          <path
                            d="M3.8958 11.1606H3.10715C2.96376 11.1606 2.86816 11.2562 2.86816 11.3996V12.1644C2.86816 12.3078 2.96376 12.4034 3.10715 12.4034H3.8958C4.03919 12.4034 4.13479 12.3078 4.13479 12.1644V11.3996C4.13479 11.2562 4.03919 11.1606 3.8958 11.1606Z"
                          />
                          <path
                            d="M6.429 11.1606H5.64035C5.49696 11.1606 5.40137 11.2562 5.40137 11.3996V12.1644C5.40137 12.3078 5.49696 12.4034 5.64035 12.4034H6.429C6.57239 12.4034 6.66799 12.3078 6.66799 12.1644V11.3996C6.66799 11.2562 6.5485 11.1606 6.429 11.1606Z"
                          />
                          <path
                            d="M8.93779 11.1606H8.14914C8.00575 11.1606 7.91016 11.2562 7.91016 11.3996V12.1644C7.91016 12.3078 8.00575 12.4034 8.14914 12.4034H8.93779C9.08118 12.4034 9.17678 12.3078 9.17678 12.1644V11.3996C9.17678 11.2562 9.08118 11.1606 8.93779 11.1606Z"
                          />
                          <path
                            d="M11.472 11.1606H10.6833C10.5399 11.1606 10.4443 11.2562 10.4443 11.3996V12.1644C10.4443 12.3078 10.5399 12.4034 10.6833 12.4034H11.472C11.6154 12.4034 11.711 12.3078 11.711 12.1644V11.3996C11.711 11.2562 11.5915 11.1606 11.472 11.1606Z"
                          />
                          <path
                            d="M13.2637 3.3697H7.64754V2.58105C8.19721 2.43765 8.62738 1.91189 8.62738 1.31442C8.62738 0.597464 8.02992 0 7.28906 0C6.54821 0 5.95074 0.597464 5.95074 1.31442C5.95074 1.91189 6.35702 2.41376 6.93058 2.58105V3.3697H1.31442C0.597464 3.3697 0 3.96716 0 4.68412V13.2637C0 13.9807 0.597464 14.5781 1.31442 14.5781H13.2637C13.9807 14.5781 14.5781 13.9807 14.5781 13.2637V4.68412C14.5781 3.96716 13.9807 3.3697 13.2637 3.3697ZM6.6677 1.31442C6.6677 0.979841 6.93058 0.716957 7.28906 0.716957C7.62364 0.716957 7.91042 0.979841 7.91042 1.31442C7.91042 1.649 7.64754 1.91189 7.28906 1.91189C6.95448 1.91189 6.6677 1.6251 6.6677 1.31442ZM1.31442 4.08665H13.2637C13.5983 4.08665 13.8612 4.34954 13.8612 4.68412V6.45261H0.716957V4.68412C0.716957 4.34954 0.979841 4.08665 1.31442 4.08665ZM13.2637 13.8612H1.31442C0.979841 13.8612 0.716957 13.5983 0.716957 13.2637V7.16957H13.8612V13.2637C13.8612 13.5983 13.5983 13.8612 13.2637 13.8612Z"
                          />
                        </svg>
                      </span>
                      {{$post->updated_at}}
                    </p>
                    <p class="flex items-center text-sm font-medium text-white">
                      <span class="mr-3">
                        <svg
                          width="20"
                          height="12"
                          viewBox="0 0 20 12"
                          class="fill-current"
                        >
                          <path
                            d="M10.2559 3.8125C9.03711 3.8125 8.06836 4.8125 8.06836 6C8.06836 7.1875 9.06836 8.1875 10.2559 8.1875C11.4434 8.1875 12.4434 7.1875 12.4434 6C12.4434 4.8125 11.4746 3.8125 10.2559 3.8125ZM10.2559 7.09375C9.66211 7.09375 9.16211 6.59375 9.16211 6C9.16211 5.40625 9.66211 4.90625 10.2559 4.90625C10.8496 4.90625 11.3496 5.40625 11.3496 6C11.3496 6.59375 10.8496 7.09375 10.2559 7.09375Z"
                          />
                          <path
                            d="M19.7559 5.625C17.6934 2.375 14.1309 0.4375 10.2559 0.4375C6.38086 0.4375 2.81836 2.375 0.755859 5.625C0.630859 5.84375 0.630859 6.125 0.755859 6.34375C2.81836 9.59375 6.38086 11.5312 10.2559 11.5312C14.1309 11.5312 17.6934 9.59375 19.7559 6.34375C19.9121 6.125 19.9121 5.84375 19.7559 5.625ZM10.2559 10.4375C6.84961 10.4375 3.69336 8.78125 1.81836 5.96875C3.69336 3.1875 6.84961 1.53125 10.2559 1.53125C13.6621 1.53125 16.8184 3.1875 18.6934 5.96875C16.8184 8.78125 13.6621 10.4375 10.2559 10.4375Z"
                          />
                        </svg>
                      </span>
                      {{$post->view}}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-wrap -mx-4">
              <div class="w-full lg:w-8/12 px-4">
                <div>
                  <p
                    class="
                      text-base text-body-color
                      leading-relaxed
                      wow
                      fadeInUp
                      teks-tengah
                    "
                    data-wow-delay=".1s"
                  >
                    {!!$post->content!!}
                  </p>
                  
                  <div class="flex flex-wrap items-center -mx-4 mb-12">
                    <div class="w-full md:w-1/2 px-4">
                      <div
                        class="
                          flex
                          items-center
                          flex-wrap
                          mb-8
                          md:mb-0
                          wow
                          fadeInUp
                        "
                        data-wow-delay=".1s"
                      >
                        <a
                          href="{{ url('blog/'.$post->category_id.'/'. $post->category->name) }}"
                          class="
                            block
                            py-2
                            px-5
                            bg-primary bg-opacity-5
                            text-primary
                            rounded
                            text-xs
                            font-medium
                            mr-2
                            md:mr-4
                            lg:mr-2
                            xl:mr-4
                            mb-2
                            hover:bg-opacity-100 hover:text-white
                          "
                        >
                          {{$post->category->name}}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="w-full lg:w-4/12 px-4">
                <div>
                  <div
                    class="
                      mb-12
                      bg-primary
                      rounded
                      relative
                      overflow-hidden
                      text-center
                      py-[60px]
                      px-11
                      lg:px-8
                      wow
                      fadeInUp
                    "
                    data-wow-delay=".1s
                    "
                  >
                    <h3 class="font-semibold text-white mb-2 text-2xl">
                      RSUD dr. H. Andi Abdurrahman Noor
                    </h3>
                    <p class="text-base text-white mb-8">
                      Senyum Santun Sapa
                    </p>
                    <form>
                      <!--  -->
                      <input readonly
                        value="rsud.tanbu@gmail.com"
                        class="
                          w-full
                          text-center
                          h-[50px]
                          text-sm
                          font-medium
                          text-white
                          rounded
                          mb-6
                          bg-[#13C296]
                          cursor-pointer
                          hover:shadow-lg hover:bg-opacity-90
                          transition
                          duration-300
                          ease-in-out
                        "
                      />
                    </form>
                    <div>
                      <span class="absolute top-0 right-0">
                        <svg
                          width="46"
                          height="46"
                          viewBox="0 0 46 46"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <circle
                            cx="1.39737"
                            cy="44.6026"
                            r="1.39737"
                            transform="rotate(-90 1.39737 44.6026)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="1.39737"
                            cy="7.9913"
                            r="1.39737"
                            transform="rotate(-90 1.39737 7.9913)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="13.6943"
                            cy="44.6026"
                            r="1.39737"
                            transform="rotate(-90 13.6943 44.6026)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="13.6943"
                            cy="7.9913"
                            r="1.39737"
                            transform="rotate(-90 13.6943 7.9913)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="25.9911"
                            cy="44.6026"
                            r="1.39737"
                            transform="rotate(-90 25.9911 44.6026)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="25.9911"
                            cy="7.9913"
                            r="1.39737"
                            transform="rotate(-90 25.9911 7.9913)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="38.288"
                            cy="44.6026"
                            r="1.39737"
                            transform="rotate(-90 38.288 44.6026)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="38.288"
                            cy="7.9913"
                            r="1.39737"
                            transform="rotate(-90 38.288 7.9913)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="1.39737"
                            cy="32.3058"
                            r="1.39737"
                            transform="rotate(-90 1.39737 32.3058)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="13.6943"
                            cy="32.3058"
                            r="1.39737"
                            transform="rotate(-90 13.6943 32.3058)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="25.9911"
                            cy="32.3058"
                            r="1.39737"
                            transform="rotate(-90 25.9911 32.3058)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="38.288"
                            cy="32.3058"
                            r="1.39737"
                            transform="rotate(-90 38.288 32.3058)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="1.39737"
                            cy="20.0086"
                            r="1.39737"
                            transform="rotate(-90 1.39737 20.0086)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="13.6943"
                            cy="20.0086"
                            r="1.39737"
                            transform="rotate(-90 13.6943 20.0086)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="25.9911"
                            cy="20.0086"
                            r="1.39737"
                            transform="rotate(-90 25.9911 20.0086)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="38.288"
                            cy="20.0086"
                            r="1.39737"
                            transform="rotate(-90 38.288 20.0086)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                        </svg>
                      </span>
                      <span class="absolute bottom-0 left-0">
                        <svg
                          width="46"
                          height="46"
                          viewBox="0 0 46 46"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <circle
                            cx="1.39737"
                            cy="44.6026"
                            r="1.39737"
                            transform="rotate(-90 1.39737 44.6026)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="1.39737"
                            cy="7.9913"
                            r="1.39737"
                            transform="rotate(-90 1.39737 7.9913)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="13.6943"
                            cy="44.6026"
                            r="1.39737"
                            transform="rotate(-90 13.6943 44.6026)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="13.6943"
                            cy="7.9913"
                            r="1.39737"
                            transform="rotate(-90 13.6943 7.9913)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="25.9911"
                            cy="44.6026"
                            r="1.39737"
                            transform="rotate(-90 25.9911 44.6026)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="25.9911"
                            cy="7.9913"
                            r="1.39737"
                            transform="rotate(-90 25.9911 7.9913)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="38.288"
                            cy="44.6026"
                            r="1.39737"
                            transform="rotate(-90 38.288 44.6026)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="38.288"
                            cy="7.9913"
                            r="1.39737"
                            transform="rotate(-90 38.288 7.9913)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="1.39737"
                            cy="32.3058"
                            r="1.39737"
                            transform="rotate(-90 1.39737 32.3058)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="13.6943"
                            cy="32.3058"
                            r="1.39737"
                            transform="rotate(-90 13.6943 32.3058)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="25.9911"
                            cy="32.3058"
                            r="1.39737"
                            transform="rotate(-90 25.9911 32.3058)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="38.288"
                            cy="32.3058"
                            r="1.39737"
                            transform="rotate(-90 38.288 32.3058)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="1.39737"
                            cy="20.0086"
                            r="1.39737"
                            transform="rotate(-90 1.39737 20.0086)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="13.6943"
                            cy="20.0086"
                            r="1.39737"
                            transform="rotate(-90 13.6943 20.0086)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="25.9911"
                            cy="20.0086"
                            r="1.39737"
                            transform="rotate(-90 25.9911 20.0086)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                          <circle
                            cx="38.288"
                            cy="20.0086"
                            r="1.39737"
                            transform="rotate(-90 38.288 20.0086)"
                            fill="white"
                            fill-opacity="0.44"
                          />
                        </svg>
                      </span>
                    </div>
                  </div>
                  
                  <div class="flex flex-wrap -mx-4 mb-8">
                    <div class="w-full px-4">
                      <h2
                        class="
                          font-semibold
                          text-dark text-2xl
                          sm:text-[28px]
                          pb-5
                          relative
                          wow
                          fadeInUp
                        "
                        data-wow-delay=".1s
                        "
                      >
                        Popular Articles
                      </h2>
                      <span
                        class="h-[2px] bg-primary w-20 mb-10 inline-block"
                      ></span>
                    </div>
                    @foreach ($popularPosts as $pop)
                    <div class="w-full md:w-1/2 lg:w-full px-4">
                      <div
                        class="
                          w-full
                          flex
                          items-center
                          pb-5
                          mb-5
                          border-0 border-[#F2F3F8]
                          md:border-b
                          lg:border-0
                          wow
                          fadeInUp
                        "
                        data-wow-delay=".1s
                        "
                      >
                        <div
                          class="
                            w-full
                            max-w-[80px]
                            h-20
                            overflow-hidden
                            mr-5
                            rounded-full
                          "
                        >
                          <img
                            src="{{asset ('storage/posts/'. $pop->image)}}"
                            alt="image"
                            class="
                            w-full
                            transition
                            group-hover:scale-125 group-hover:rotate-6"
                          />
                        </div>
                        <div class="w-full">
                          <h4>
                            <a
                              href="{{url('blog/'.$pop->slug)}}"
                              class="
                                text-lg
                                lg:text-base
                                xl:text-lg
                                leading-snug
                                font-medium
                                text-dark
                                hover:text-primary
                                mb-1
                                inline-block
                              "
                            >
                              {{$pop->title}}
                            </a>
                          </h4>
                          
                          <p class="text-sm text-body-color">{{$pop->user->name}}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>                   
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4 mt-14 wow fadeInUp" data-wow-delay=".2s">
            <h2
              class="
                font-semibold
                text-dark text-2xl
                sm:text-[28px]
                pb-5
                relative
              "
            >
              Related Articles
            </h2>
            <span class="h-[2px] bg-primary w-20 mb-10 inline-block"></span>
          </div>
          @foreach ($relatedPosts as $rel)
          <div class="w-full md:w-1/2 lg:w-1/3 px-4">
            <div class="mb-10 group wow fadeInUp" data-wow-delay=".2s">
              <div class="rounded overflow-hidden mb-8">
                <a href="{{url('blog/'.$rel->slug)}}" class="block">
                  <img
                    src="{{asset('storage/posts/'. $rel->image)}}"
                    alt="image"
                    class="
                      w-full
                      transition
                      group-hover:scale-125 group-hover:rotate-6
                    "
                  />
                </a>
              </div>
              <div>
                <span
                  class="
                    bg-primary
                    rounded
                    inline-block
                    text-center
                    py-1
                    px-4
                    text-xs
                    leading-loose
                    font-semibold
                    text-white
                    mb-5
                  "
                >
                  {{$rel->created_at}}
                </span>
                <h3>
                  <a
                    href="{{url('blog/'. $rel->slug)}}"
                    class="
                      font-semibold
                      text-xl
                      sm:text-2xl
                      lg:text-xl
                      xl:text-2xl
                      mb-4
                      inline-block
                      text-dark
                      hover:text-primary
                    "
                  >
                    {{$rel->title}}
                  </a>
                </h3>
                <p class="text-base text-body-color">
                  {{$rel->user->name}}
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- ====== Blog Details Section End -->

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
                  <p class="text-base text-[#f3f4fe]">
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