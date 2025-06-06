<template>
    <div class="luxury-recycle">
      <div class="welcome-container">
        <div class="flex justify-center items-center text-center flex-col ">
            <h2>Welcome to</h2>
            <img :src="Logo" class="w-[135px]">

            <p class="tagline">Let's check out what's on the inside!</p>
        </div>
        
        
        <div class="door-container">
          <Link href="/home">
            <img :src="PintuImg" alt="Door" class="door-image">
          </Link>
          
          
            <img
            :src="GagangImg"
            alt="Door handle"
            class="handle-image "
            :class="{ rotated: isRotated }"
            @click="toggleHandle"
            />
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import PintuImg from '../../images/pintu.png';
  import GagangImg from '../../images/gagang-pintu.webp';
  import Logo from '../../images/LuxuryLogo.webp';
  import { Link } from '@inertiajs/vue3'

  const isRotated = ref(false)

    const toggleHandle = () => {
    isRotated.value = !isRotated.value
    }
  </script>
  
  <style scoped>
  .luxury-recycle {
    font-family: Arial, sans-serif;
    text-align: center;
    padding: 20px;
    background-color: #f5f5f5;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .welcome-container {
    max-width: 600px;
    margin: 0 auto;
  }
  
  h1 {
    color: #333;
    font-size: 2.5rem;
    margin-bottom: 10px;
  }
  
  .tagline {
    color: #666;
    font-size: 1.2rem;
    margin-bottom: 30px;
    font-style: italic;
  }
  
  .door-container {
    position: relative;
    margin: 0 auto;
    width: fit-content;
  }
  
  .door-image {
    width: 136px; height: 352px;
    display: block;
  }
  
  .handle-image {
    position: absolute;
    top: 40%;
    right: 40%;
   
    transform: translateY(-50%);
    transition: transform 0.3s ease-in-out,  0.5s ease-in-out
  }
  .handle-image.rotated {
    transform: rotate(-21deg);
    }
  </style>