<script setup>
import Layout from "../Layout/Layout.vue";
import Glasses from '../../images/handglasses.png';
import Bag from '../../images/handbag.png';
import BagHumanoid from '../../images/baghumanoid.png';

let items = Array(30).fill('NEW ARRIVAL!');
</script>

<template>
  <Layout>
    <!-- Hero -->
    <div class="flex justify-between items-center h-[100vh] bg-canvas">
      <div class="translate-y-1/2">
        <img :src="Glasses" alt="Kacamata" />
      </div>
      <div class="text-center text-2xl flex-[0.8] max-w-[500px] mx-8">
        <h1 class="text-[40px]/[60px] mb-[32px]">
          Vintage is Rise for the picking. April will be more exciting!
        </h1>
        <button class="bg-primary px-3 py-2 text-canvas text-center font-bold text-[16px] w-[162px]">
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
        <div class="py-4 px-6 flex whitespace-nowrap text-white font-bold text-lg animate-marquee" style="gap: 48px;">
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
        <div class="py-4 px-6 flex whitespace-nowrap text-white font-bold text-lg animate-marquee" style="gap: 48px;">
          <span v-for="(item, index) in items" :key="index">{{ item }}</span>
        </div>
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
    -ms-overflow-style: none; /* IE & Edge */
    scrollbar-width: none; /* Firefox */
  }
</style>
