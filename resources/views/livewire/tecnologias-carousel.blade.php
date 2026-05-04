<div wire:init="loadTecnologys" $wire:ignore>
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    <h2 class="text-lg font-semibold text-center pb-5 text-neutral-900">
        Tecnologías
    </h2>
    @if (count($tecnologys))
        {{-- <img class="" src="{{ Storage::url($tecnology->image->url) }}" alt="{{ $tecnology->title }}"> --}}
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    @else
        <div class="altura-loading">
            <div class="hidden lg:block">
                <div class="flex flex-nowrap">
                    @for ($i = 1; $i <= 5; $i++)
                        <article class=" w-[227px] h-[270px] mr-4 bg-gray-300 rounded-lg">
                            <figure class="relative overflow-hidden rounded-lg">
                                <div class="bg-gray-400 animate-pulse w-full h-36">
                                </div>
                            </figure>
                            <div class="pt-3 px-2">
                                <div class="text-sm font-semibold text-center bg-gray-400 animate-pulse py-2 mx-4">
                                </div>
                                <div class="text-center mt-4 mb-2 font-semibold bg-gray-400 animate-pulse py-2 mx-6">
                                </div>
                                <div
                                    class="bg-gray-400 animate-pulse mt-4 h-10 rounded-lg px-3 py-2 items-center justify-center">
                                </div>
                            </div>
                        </article>
                    @endfor
                </div>
            </div>
            <div class="block md:hidden">
                <div class="flex flex-nowrap">
                    <article class=" w-[226px] h-[253px] mr-4 bg-gray-300 rounded-lg">
                        <figure class="relative overflow-hidden rounded-lg">
                            <div class="bg-gray-400 animate-pulse w-full h-32">
                            </div>
                        </figure>
                        <div class="pt-3 px-2">
                            <div class="text-sm font-semibold text-center bg-gray-400 animate-pulse py-2 mx-4">
                            </div>
                            <div class="text-center mt-4 mb-2 font-semibold bg-gray-400 animate-pulse py-2 mx-6">
                            </div>
                            <div
                                class="bg-gray-400 animate-pulse mt-4 h-10 rounded-lg px-3 py-2 items-center justify-center">
                            </div>
                        </div>
                    </article>
                    <article class=" w-[126px] h-[253px] bg-gray-300 rounded-lg">
                        <figure class="relative overflow-hidden rounded-lg">
                            <div class="bg-gray-400 animate-pulse w-full h-32">
                            </div>
                        </figure>
                        <div class="pt-3 pl-2">
                            <div class="text-sm font-semibold text-center bg-gray-400 animate-pulse py-2 ml-4">
                            </div>
                            <div class="text-center mt-4 mb-2 font-semibold bg-gray-400 animate-pulse py-2 ml-6">
                            </div>
                            <div
                                class="bg-gray-400 animate-pulse mt-4 h-10 rounded-l-lg px-3 py-2 items-center justify-end">
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    @endif
</div>
