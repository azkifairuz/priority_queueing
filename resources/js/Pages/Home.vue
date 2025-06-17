<script setup>
import Layout from "../Layout/Layout.vue";
import Glasses from '../../images/handglasses.png';
import Bag from '../../images/handbag.png';
import BagHumanoid from '../../images/baghumanoid.png';
import accessories1 from '../../images/accessories1.png';
import bag1 from '../../images/bag1.png';
import shoes1 from '../../images/shoes1.png';
import  brand1 from '../../images/brand/1.png';

let items = Array(30).fill('NEW ARRIVAL!');
</script>

<template>
  <Layout>
    <!-- Hero -->
    <div class="flex justify-between items-center h-[100vh] bg-canvas">
      <div class="translate-y-1/2">
        <img :src="Glasses" alt="Kacamata" />
      </div>
      <div class="text-center text-2xl flex-[0.8]  max-w-[500px] mx-8">
        <h1 class="text-[40px]/[60px] mb-[32px] font-dawning ">
          Vintage is Rise for the picking. April will be more exciting!
        </h1>
        <button class="bg-primary px-3 py-3 cursor-pointer text-canvas text-center font-bold text-[16px] w-[162px] font-josefin">
          SHOP NOW
        </button>
      </div>
      <div class="-translate-y-1/2">
        <img :src="Bag" alt="Tas" />
      </div>
    </div>


    <!-- Section wrapper agar bisa kontrol layer -->
    <div class="relative z-0 overflow-hidden py-12">

      <!-- Pita atas -->
      <div class="relative z-10 rotate-[-1.5deg] bg-primary">
        <div class="absolute bottom-[-50px] left-0 w-full h-[50px] bg-secondary z-0"></div>

        <div class="py-4 px-6 flex whitespace-nowrap text-white font-bold text-lg animate-marquee font-josefin" style="gap: 48px;">
          <span v-for="(item, index) in items" :key="index">{{ item }}</span>
        </div>
      </div>


      <div class="relative z-0 bg-secondary py-24 min-h-[877px]">
        <div class="grid grid-cols-1 md:grid-cols-[50px_1fr_50px] lg:grid-cols-[174px_1fr_174px] w-full h-full">

          <!-- Kotak kiri -->
          <div class="bg-primary hidden md:block"></div>

          <!-- Konten Tengah -->
          <div class="flex justify-center px-4 md:px-8">
            <div class="flex flex-wrap justify-center gap-6 max-w-[1280px] w-full">

              <!-- Kolom 1 -->
              <div class="flex flex-col w-full sm:w-[422px]">
                <div class="w-full h-[469px] bg-white"></div>
                <div class="w-full flex flex-nowrap overflow-x-auto gap-3 bg-primary p-3 scrollbar-hidden">
                  <div v-for="n in 5" :key="n" class="w-[70px] h-[70px] bg-[#D9D9D9] flex-shrink-0"></div>
                </div>
                <div class="w-full p-4 flex justify-between items-center bg-canvas">
                  <div>
                    <h1 class="text-[16px]">DIANA FLAP SHOULDER BAG</h1>
                    <p class="font-bold">CHANNEL</p>
                  </div>
                  <h1 class="text-primary font-bold">USD $ 2.100</h1>
                </div>
              </div>

              <!-- Kolom 2 -->
              <div class="flex flex-col gap-7 w-full sm:w-[389px]">
                <div class="bg-primary py-6">
                  <img :src="BagHumanoid" class="mx-auto" alt="" />
                </div>
                <div class="flex flex-col">
                  <div class="min-h-[309px] bg-white"></div>
                  <div class="w-full p-4 flex justify-between items-center bg-canvas">
                    <div>
                      <h1 class="text-[16px]">DIANA FLAP SHOULDER BAG</h1>
                      <p class="font-bold">CHANNEL</p>
                    </div>
                    <h1 class="text-primary font-bold">USD $ 2.100</h1>
                  </div>
                </div>
              </div>

              <!-- Kolom 3 -->
              <div class="flex flex-col gap-7 w-full sm:w-[389px]">
                <div class="flex flex-col">
                  <div class="min-h-[267px] bg-white"></div>
                  <div class="w-full p-4 flex justify-between items-center bg-canvas">
                    <div>
                      <h1 class="text-[16px]">DIANA FLAP SHOULDER BAG</h1>
                      <p class="font-bold">CHANNEL</p>
                    </div>
                    <h1 class="text-primary font-bold">USD $ 2.100</h1>
                  </div>
                </div>
                <div class="bg-primary min-h-[273px] text-white flex justify-center items-center px-[64px] text-center">
                  <div class="cursor-pointer">
                    <p class="text-base font-medium">SEE MORE OF</p>
                    <p class="text-base font-medium">OUR LATEST</p>
                    <p class="text-base font-medium">COLLECTIONS</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Kotak kanan -->
          <div class="bg-primary hidden md:block"></div>

        </div>
      </div>

      <!-- Pita bawah -->
      <div class="relative z-10 rotate-[1.9deg] bg-primary">
        <div class="absolute bottom-[61px] left-0 w-full h-[62px] bg-secondary z-0"></div>

        <div class="py-4 px-6 flex whitespace-nowrap text-white font-bold text-lg animate-marquee font-josefin" style="gap: 48px;">
          <span v-for="(item, index) in items" :key="index">{{ item }}</span>
        </div>

      </div>
    </div>
    <div class="w-full mx-8 my-8 py-12 flex flex-col justify-center items-center ">
      <div class="flex gap-[400px] items-center">
        <!-- Judul kiri -->
        <h1 class="text-6xl font-dawning cursor-pointer">Shop</h1>

        <div class="relative w-[300px] h-[400px] overflow-visible shrink-0">
          <!-- Kotak pink -->
          <div
            class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 h-full w-full bg-secondary border-3 border-primary z-0">
          </div>

          <!-- Kotak putih diputar -->
          <div class="absolute left-1/2 top-1/2 h-full w-full -translate-x-1/2 -translate-y-1/2 z-10">
            <div class="h-full w-full bg-white border-3 border-primary rotate-[8deg] origin-center"></div>
          </div>
        </div>

        <!-- Teks kanan -->
        <div class="flex flex-col cursor-pointer ">
          <img class="mb-2" :src="accessories1" alt="">
          <span class="text-4xl font-medium font-dawning text-black">See More</span>
          <span class="text-4xl font-medium font-dawning text-black">Accessories</span>
        </div>
      </div>
    </div>
    <div class="w-full mx-8 my-8 py-12 flex flex-col justify-center items-center ">
      <div class="flex gap-[400px] items-center">
        <!-- Kotak kiri -->

        <div class="relative w-[300px] h-[400px] overflow-visible shrink-0">
          <!-- Kotak pink -->
          <div
            class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 h-full w-full bg-secondary border-3 border-primary z-0">
          </div>

          <!-- Kotak putih diputar -->
          <div class="absolute left-1/2 top-1/2 h-full w-full -translate-x-1/2 -translate-y-1/2 z-10">
            <div class="h-full w-full bg-white border-3 border-primary -rotate-[8deg] origin-center"></div>
          </div>
        </div>

        <!-- Tengah -->
        <div class="flex flex-col cursor-pointer  text-center">
          <img class="mb-4" :src="bag1" alt="">
          <span class="text-4xl font-medium font-dawning text-black">See More</span>
          <span class="text-4xl font-medium font-dawning text-black">Bag</span>
        </div>
        <!-- Kotak Kanan -->

        <div class="relative w-[300px] h-[400px] overflow-visible shrink-0 translate-y-6">
          <!-- Kotak pink -->
          <div
            class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 h-full w-full bg-secondary border-3 border-primary z-0">
          </div>

          <!-- Kotak putih diputar -->
          <div class="absolute left-1/2 top-1/2 h-full w-full -translate-x-1/2 -translate-y-1/2 z-10">
            <div class="h-full w-full bg-white border-3 border-primary rotate-[8deg] origin-center"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full mx-8 my-8 py-12 flex flex-col justify-center items-center ">
      <div class="flex gap-[400px] items-center">
        <!-- Judul kiri -->
        <div class="flex flex-col cursor-pointer text-center">
          <img class="mb-2 h-[100px] " :src="shoes1" alt="">
          <span class="text-4xl font-medium font-dawning text-black">See More</span>
          <span class="text-4xl font-medium font-dawning text-black">Shoes</span>
        </div>

        <div class="relative w-[300px] h-[400px] overflow-visible shrink-0">
          <!-- Kotak pink -->
          <div
            class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 h-full w-full bg-secondary border-3 border-primary z-0">
          </div>

          <!-- Kotak putih diputar -->
          <div class="absolute left-1/2 top-1/2 h-full w-full -translate-x-1/2 -translate-y-1/2 z-10">
            <div class="h-full w-full bg-white border-3 border-primary rotate-[8deg] origin-center"></div>
          </div>
        </div>

        <!-- Teks kanan -->
        <div class="flex flex-col cursor-pointer ">
          <span class="text-4xl font-medium font-dawning text-black">View All...</span>
        </div>
      </div>
    </div>
    <div class="relative z-0 overflow-hidden py-12">

      <!-- Pita atas -->
      <div class="relative z-10 rotate-[1.5deg] bg-primary">
        <div class="absolute bottom-[-50px] left-0 w-full h-[50px]  z-0"></div>

        <div class="py-4 px-6 flex whitespace-nowrap text-white font-bold text-lg animate-marquee font-josefin" style="gap: 48px;">
          <span v-for="(item, index) in items" :key="index">{{ item }}</span>
        </div>
      </div>


      <div class="flex  z-0 py-24 min-h-[877px]">
        
            <div class="relative w-[780px]  ml-[520px] bg-secondary rounded-3xl px-[48px] py-[19px]">
               <div class="flex items-center justify-center gap-[52px]">
                  <div
                    v-for="n in 8"
                    :key="n"
                    class="bg-white w-[40px] h-[40px] rounded-full"
                  ></div>
               </div>
               <p class="text-black font-[400] text-[28px] font-dawning leading-16 ">
                Are you looking to sell items?<br> We can certainly help! The steps and requirements are simple and easy to understand. You have two convenient choices: you can consign your items with our expert authenticity service, or you can sell them directly through our platform. We invite you to upload your product details, and we kindly ask that you familiarize yourself with our product guidelines. 
               </p>
               <p class="text-black font-[400] text-[28px] font-dawning mt-10 ">
                Thank You
               </p>
               <div class="absolute bottom-[-20px] right-[75px] flex gap-4 uppercase font-bold text-[16px]">
                <button class="px-4 w-[215px] py-3 bg-white text-primary cursor-pointer  shadow">Read Guideline</button>
                <button class="px-4 py-3 bg-primary cursor-pointer  w-[215px] text-white  shadow">Upload Product</button>
               </div>
               <div class="w-[238px] absolute right-[-175px] top-[-40px] h-[238px] rotate-[6.835deg] bg-secondary border-3 border-primary ">
                  
               </div>
               <div class="absolute bg-white w-[380px] h-[380px] right-[-375px] top-[80px] border-2 border-black ">

               </div>
               <div class="w-[170px] absolute right-[-105px] bottom-[60px] h-[200px] rotate-[-6.835deg] bg-white border-3 border-primary ">
                  
                </div>
                <div class="w-[238px] absolute right-[-505px] bottom-[60px] h-[238px] rotate-[6.835deg] bg-primary border-3 -z-10 ">
                  
                </div>
                <div class="w-[170px] absolute right-[-480px] top-[20px] h-[200px] rotate-[-6.835deg] bg-white border-3 border-primary ">
                  
                </div>
            </div>
        
      </div>

      <!-- Pita bawah -->
      <div class="relative z-10 rotate-[-1.9deg] bg-primary">
        <div class="absolute bottom-[61px] left-0 w-full h-[62px]  z-0"></div>

        <div class="py-4 px-6 flex whitespace-nowrap text-white font-bold text-lg animate-marquee font-josefin" style="gap: 48px;">
          <span v-for="(item, index) in items" :key="index">{{ item }}</span>
        </div>

      </div>
    </div>
    <div class="w-full p-6 mt-10 flex justify-center items-center flex-col gap-[98px]">
      <div class="flex justify-center items-center gap-[48px]">
        <img :src="brand1" alt="Kacamata" />
        <img :src="brand1" alt="Kacamata" />
        <img :src="brand1" alt="Kacamata" />
        <img :src="brand1" alt="Kacamata" />
        
      </div>
      <div class="flex justify-center items-center gap-[48px]">
        <img :src="brand1" alt="Kacamata" />
        <img :src="brand1" alt="Kacamata" />
        <img :src="brand1" alt="Kacamata" />
        <img :src="brand1" alt="Kacamata" />
      </div>

    </div>
    <div class="w-full bg-primary p-[52px] text-center">
      <h1 class="uppercase font-josefin text-white text-[62px] font-bold">Available brands</h1>
    </div>
      <div class="w-full p-6 mt-10 flex justify-center items-center flex-col gap-[98px]">
      <div class="flex justify-center items-center gap-[48px]">
        <img :src="brand1" alt="Kacamata" />
        <img :src="brand1" alt="Kacamata" />
        <img :src="brand1" alt="Kacamata" />
        <img :src="brand1" alt="Kacamata" />
        
      </div>
      <div class="flex justify-center items-center gap-[48px]">
        <img :src="brand1" alt="Kacamata" />
        <img :src="brand1" alt="Kacamata" />
        <img :src="brand1" alt="Kacamata" />
        <img :src="brand1" alt="Kacamata" />
      </div>

    </div>
  </Layout>
</template>

<style>
@keyframes marquee {
  0% {
    transform: translateX(0%);
  }

  100% {
    transform: translateX(-100%);
  }
}

.animate-marquee {
  animation: marquee 20s linear infinite;
}

.top-banner {
  display: inline-flex;
  transform: rotate(-1.572deg);
  padding: 16px;
  align-items: center;
  gap: 48px;
  color: white;
}

.bottom-banner {
  display: inline-flex;
  transform: rotate(1.911deg);
  padding: 16px;
  align-items: center;
  gap: 48px;
}
.top-banner2 {
  display: inline-flex;
  transform: rotate(1.572deg);
  padding: 16px;
  align-items: center;
  gap: 48px;
  color: white;
}

.bottom-banner2 {
  display: inline-flex;
  transform: rotate(-1.911deg);
  padding: 16px;
  align-items: center;
  gap: 48px;
}

.text-banner {
  color: var(--main-002, #FFF);
  text-align: center;
  font-size: 20px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
}

.main-container {
  min-height: 877px;
  flex-shrink: 0;
}

.scrollbar-hidden::-webkit-scrollbar {
  display: none;
}

.scrollbar-hidden {
  -ms-overflow-style: none;
  /* IE & Edge */
  scrollbar-width: none;
  /* Firefox */
}
</style>
