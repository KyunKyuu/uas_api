Tugas UAS API - Teguh Iqbal - 2142406
Website E-Commerce dengan 2 metode API dan fake payment gateway

Langkah Instalasi
1. Import file database nya dengan nama "uasapi"
2. Buat file .env nya dengan nama database "uasapi"
3. Ketikan perintah "composer install" untukk mendownload module nya
4. Jalankan php artisan serve, dan happy running

-Perhatian !!
1. Untuk mengakses route "Produk", GET/PUT/POST/DELETE pada POSTMAN.
   tambahkan commend Accept = apllication/json  di header postman nya (lihat gambar)
   ![image](https://github.com/KyunKyuu/uas_api/assets/57865250/78b8f92b-4dc2-4d0c-b4a7-ebe0ec532c86)

   kenapa hal ini perlu dilakukan ? karna saya menggunakan 2 metode return pada route "produk". untuk pemanggilan di postman, mengarah pada     
   perintah if (request()->wantsJson()). sehingga jika di postman nya tidak menggunakam accept json maka akan error karna yang dipanggl nya ke 
   return view.
   ![image](https://github.com/KyunKyuu/uas_api/assets/57865250/8cae3de1-b4a8-47ee-98d8-894788f255f3)

   Untuk route yang lain, "Review", dan "Keranjang" lakukan saja seperti biasa, karna saya menggunakan 1 return json, dan menggunakan ajax di 
   view nya

