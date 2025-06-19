<template>
  <div class="min-h-screen bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-blue-600">AntrianRS Admin</h1>
      <button @click="showLogin = true" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
        Login
      </button>
    </nav>

    <!-- Hero Image Full -->
    <div class="w-full h-[400px] bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1626315869436-d6781ba69d6e?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
      <div class="w-full h-full bg-black bg-opacity-40 flex items-center justify-center">
        <h2 class="text-white text-4xl md:text-5xl font-bold text-center">
          Sistem Antrian Prioritas Rumah Sakit
        </h2>
      </div>
    </div>

    <!-- 3 Card Info -->
    <section class="py-16 px-6 md:px-20 bg-white">
      <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 shadow hover:shadow-md transition">
          <div class="text-3xl mb-3 text-blue-600">✅</div>
          <h3 class="text-xl font-semibold mb-2 text-gray-800">Get Number</h3>
          <p class="text-gray-600">Pasien mendaftarkan diri dan mendapatkan nomor antrian secara otomatis.</p>
        </div>
        <div class="bg-green-50 border border-green-200 rounded-lg p-6 shadow hover:shadow-md transition">
          <div class="text-3xl mb-3 text-green-600">🚀</div>
          <h3 class="text-xl font-semibold mb-2 text-gray-800">Start Queue</h3>
          <p class="text-gray-600">Admin memulai pemanggilan sesuai prioritas tingkat urgensi medis.</p>
        </div>
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 shadow hover:shadow-md transition">
          <div class="text-3xl mb-3 text-yellow-600">🔄</div>
          <h3 class="text-xl font-semibold mb-2 text-gray-800">In Process</h3>
          <p class="text-gray-600">Pasien sedang dalam penanganan dokter atau tindakan lebih lanjut.</p>
        </div>
      </div>
    </section>

    <!-- Modal Login -->
    <div v-if="showLogin" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white p-8 rounded-lg w-full max-w-md shadow-lg relative">
        <button @click="showLogin = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl">
          &times;
        </button>
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Login Admin</h3>
        <form @submit.prevent="submitLogin">
          <div class="mb-4">
            <label class="block text-gray-700">Username</label>
            <input v-model="email" type="text" required class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
          </div>
          <div class="mb-6">
            <label class="block text-gray-700">Password</label>
            <input v-model="password" type="password" required class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
          </div>
          <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
              Login
            </button>
          </div>
        </form>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref } from 'vue'

const showLogin = ref(false)
const email = ref('')
const password = ref('')

const submitLogin = async () => {
  try {
    const response = await axios.post('/login', {
      username: email.value,     // Ganti label "email" di input juga jadi "username"
      password: password.value,
    })

    if (response.data.success) {
      window.location.href = response.data.redirect
    }
  } catch (error) {
    alert(error.response?.data?.message || 'Login gagal')
  }
}
</script>
