# مشروع Laravel لموقع مؤسسة عساف

هذا المشروع يوضح كيف يمكنك تحويل الموقع الثابت الموجود في الملفات المرفقة (HTML/CSS/JS) إلى تطبيق Laravel كامل مع لوحة تحكم تعتمد على Livewire. تم تقسيم الكود إلى نماذج (Models) ومهاجرات (Migrations) ومتحكمات (Controllers) ومكونات Livewire وواجهات Blade جاهزة.

## كيف تستخدم هذه الملفات؟

1. أنشئ مشروع Laravel جديد بواسطة الأوامر الآتية:

```bash
composer create-project laravel/laravel assaf-cars
cd assaf-cars
composer require livewire/livewire
php artisan migrate
```

2. انسخ محتويات مجلد **assaf‑laravel** إلى مشروعك الجديد. إذا طلب منك استبدال ملفات، وافق على ذلك.

3. انسخ الصور والملفات الثابتة (CSS/JS/IMG) من الموقع الأصلى إلى مجلد `public/` فى مشروع Laravel:

```
assaf-cars/public/css → انسخ ملفات css من css/
assaf-cars/public/js  → انسخ main.js ومكتبات owlcarousel/tempusdominus عند الحاجة
assaf-cars/public/img → انسخ كل الصور من img/
```

4. شغّل خادم التطوير:

```bash
php artisan serve
```

5. افتح المتصفح على `http://localhost:8000` لرؤية الموقع. للتسجيل والدخول إلى لوحة التحكم استخدم روابط "تسجيل الدخول" الموجودة فى القائمة.

## المحتويات

- **app/Models** – نماذج ORM تمثل جداول قاعدة البيانات (السيارات، الأجهزة، الشحن، الطلبات، المستخدمون).
- **database/migrations** – ملفات الهجرة لإنشاء الجداول.
- **app/Http/Controllers** – متحكمات للصفحات الأمامية ولإدارة الطلبات.
- **app/Livewire** – مكونات Livewire للواجهة الأمامية ولوحة التحكم.
- **resources/views** – قوالب Blade للصفحات الأمامية واللوحة.

### الصفحات الأمامية

* `resources/views/front/home.blade.php` – الصفحة الرئيسية.
* `resources/views/front/cars.blade.php` – عرض السيارات بشكل ديناميكى عبر مكون `CarList`.
* `resources/views/front/electric.blade.php` – عرض الأجهزة الكهربائية بواسطة `ElectricList`.
* `resources/views/front/shipping.blade.php` – صفحة الشحن والجمارك مع مكون `ShippingList`.
* `resources/views/front/forms/general-service.blade.php`, `car-service.blade.php`, `shipping-service.blade.php` – نماذج الطلبات الثلاثة.
* `resources/views/layouts/front.blade.php` – قالب عام للصفحات الأمامية يحتوى على الهيدر والقائمة.

### لوحة التحكم (Dashboard)

* `resources/views/dashboard/index.blade.php` – الصفحة الرئيسية للوحة التحكم.
* `resources/views/dashboard/cars.blade.php`, `devices.blade.php`, `shipments.blade.php`, `requests.blade.php` – أقسام إدارة المحتوى.

### Livewire Components

* `app/Livewire/CarList.php` – يعرض قائمة السيارات للزوار مع إمكانية البحث.
* `app/Livewire/CarForm.php` – يسمح للمسؤول بإضافة أو تعديل سيارة.
* `app/Livewire/DeviceList.php` و `DeviceForm.php` – لإدارة الأجهزة.
* `app/Livewire/ShippingList.php` و `ShippingForm.php` – لإدارة بيانات الشحن والجمارك.
* `app/Livewire/ServiceRequestTable.php` – يعرض طلبات الخدمات (الاستفسارات) فى لوحة التحكم.

## قاعدة البيانات

تم إعداد الهجرات لتنشئ الجداول التالية:

- **cars**: اسم السيارة، الموديل، السعر اليومى، الوصف، وصورة.
- **devices**: اسم الجهاز، الوصف، السعر، وصورة.
- **shipments**: نوع الشحن (برى/بحرى/جوى)، وصف، الحالة، رقم مرجعى.
- **service_requests**: نوع الطلب (general/car/shipping)، الاسم، كود الهاتف، الهاتف، البلد، نوع السيارة أو نوع الشحن، تفاصيل إضافية.

يمكنك تعديل الحقول حسب حاجتك فى الهجرات والنماذج.

## التوثيق

تم وضع تعليق لكل ملف لشرح دوره. يمكن تمديد المكونات لإضافة وظائف إضافية مثل رفع الصور، إرسال إشعارات بريد إلكترونى، أو تفعيل صلاحيات المستخدمين.
