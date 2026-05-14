function validateNativeJS(event) {
    // Form elemanlarını yakala
    const isim = document.getElementById('isim').value.trim();
    const email = document.getElementById('email').value.trim();
    const telefon = document.getElementById('telefon').value.trim();

    // 1. Boş Alan Kontrolü
    if (isim === "" || email === "" || telefon === "") {
        alert("[Native JS] Hata: Lütfen Ad, E-mail ve Telefon alanlarını boş bırakmayınız.");
        return;
    }

    // 2. Email Format Kontrolü (Regex)
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("[Native JS] Hata: Lütfen geçerli bir E-mail adresi giriniz. (Örn: isim@mail.com)");
        return;
    }

    // 3. Telefon Rakam Kontrolü (Sadece rakam)
    const phoneRegex = /^[0-9]+$/;
    if (!phoneRegex.test(telefon)) {
        alert("[Native JS] Hata: Telefon numarası sadece rakamlardan oluşmalıdır.");
        return;
    }

    // Başarılı ise formu gönder
    alert("[Native JS] Başarılı! Veriler sunucuya gönderiliyor...");
    document.getElementById('contactForm').submit();
}

// --------- 2. YÖNTEM: VUE.JS FRAMEWORK ---------
const { createApp } = Vue;
createApp({
    data() {
        return {
            isim: '',
            email: '',
            telefon: ''
        }
    },
    methods: {
        validateVueJS() {
            // 1. Boş Alan Kontrolü
            if (this.isim.trim() === "" || this.email.trim() === "" || this.telefon.trim() === "") {
                alert("[Vue.js] Hata: Lütfen zorunlu alanları doldurun.");
                return;
            }

            // 2. Email Format Kontrolü
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(this.email.trim())) {
                alert("[Vue.js] Hata: Geçersiz e-mail formatı tespit edildi.");
                return;
            }

            // 3. Telefon Rakam Kontrolü
            const phoneRegex = /^[0-9]+$/;
            if (!phoneRegex.test(this.telefon.trim())) {
                alert("[Vue.js] Hata: Lütfen telefon numarasını harf kullanmadan girin.");
                return;
            }

            // Başarılı ise formu gönder
            alert("[Vue.js] Başarılı! Veriler sunucuya gönderiliyor...");
            this.$refs.myForm.submit(); // Formu Vue ref üzerinden gönder
        }
    }
}).mount('#vue-app');