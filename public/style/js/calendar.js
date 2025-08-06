

// Nama bulan dalam bahasa Indonesia
const monthNames = [
  "Januari", "Februari", "Maret", "April", "Mei", "Juni",
  "Juli", "Agustus", "September", "Oktober", "November", "Desember"
];

// Data hari libur nasional Indonesia
const holidays2024 = {
  "2024-01-01": "Tahun Baru Masehi",
  "2024-02-10": "Tahun Baru Imlek",
  "2024-03-11": "Hari Raya Nyepi",
  "2024-03-29": "Wafat Isa Al-Masih",
  "2024-05-01": "Hari Buruh Internasional",
  "2024-05-09": "Kenaikan Isa Al-Masih",
  "2024-05-23": "Hari Raya Waisak",
  "2024-06-01": "Hari Lahir Pancasila",
  "2024-06-17": "Idul Adha",
  "2024-07-07": "Tahun Baru Hijriyah",
  "2024-08-17": "Hari Kemerdekaan RI",
  "2024-09-16": "Maulid Nabi Muhammad SAW",
  "2024-12-25": "Hari Raya Natal"
};

const holidays2025 = {
  "2025-01-01": "Tahun Baru Masehi",
  "2025-01-29": "Tahun Baru Imlek",
  "2025-03-29": "Hari Raya Nyepi",
  "2025-04-18": "Wafat Isa Al-Masih",
  "2025-05-01": "Hari Buruh Internasional",
  "2025-05-12": "Hari Raya Waisak",
  "2025-05-29": "Kenaikan Isa Al-Masih",
  "2025-06-01": "Hari Lahir Pancasila",
  "2025-06-30": "Idul Fitri",
  "2025-07-01": "Idul Fitri",
  "2025-08-17": "Hari Kemerdekaan RI",
  "2025-09-07": "Idul Adha",
  "2025-09-27": "Tahun Baru Hijriyah",
  "2025-12-06": "Maulid Nabi Muhammad SAW",
  "2025-12-25": "Hari Raya Natal"
};

const holidays2026 = {
  "2026-01-01": "Tahun Baru Masehi",
  "2026-02-17": "Tahun Baru Imlek",
  "2026-03-18": "Hari Raya Nyepi",
  "2026-04-03": "Wafat Isa Al-Masih",
  "2026-05-01": "Hari Buruh Internasional",
  "2026-05-13": "Hari Raya Waisak",
  "2026-05-21": "Kenaikan Isa Al-Masih",
  "2026-06-01": "Hari Lahir Pancasila",
  "2026-06-06": "Idul Adha",
  "2026-06-26": "Tahun Baru Hijriyah",
  "2026-08-17": "Hari Kemerdekaan RI",
  "2026-09-05": "Maulid Nabi Muhammad SAW",
  "2026-12-25": "Hari Raya Natal"
};

function getAllHolidays() {
  return { ...holidays2024, ...holidays2025, ...holidays2026 };
}

function isHoliday(date) {
  const holidays = getAllHolidays();
  const dateStr = date.toISOString().split('T')[0];
  return holidays[dateStr] || false;
}

let display = document.querySelector(".display");
let days = document.querySelector(".days");
let previous = document.querySelector(".left");
let next = document.querySelector(".right");

let date = new Date();
let year = date.getFullYear();
let month = date.getMonth();

function displayCalendar() {
  const firstDay = new Date(year, month, 1);
  const lastDay = new Date(year, month + 1, 0);
  const firstDayIndex = firstDay.getDay();
  const numberOfDays = lastDay.getDate();

  // Format bulan dalam bahasa Indonesia
  display.innerHTML = `${monthNames[month]} ${year}`;

  // Tambahkan cell kosong untuk hari sebelum tanggal 1
  for (let x = 1; x <= firstDayIndex; x++) {
    const div = document.createElement("div");
    div.innerHTML += "";
    days.appendChild(div);
  }

  // Tambahkan tanggal dalam bulan
  for (let i = 1; i <= numberOfDays; i++) {
    let div = document.createElement("div");
    let currentDate = new Date(year, month, i);

    div.dataset.date = currentDate.toDateString();
    div.innerHTML += i;
    days.appendChild(div);

    // Cek apakah hari ini
    if (
      currentDate.getFullYear() === new Date().getFullYear() &&
      currentDate.getMonth() === new Date().getMonth() &&
      currentDate.getDate() === new Date().getDate()
    ) {
      div.classList.add("current-date");
    }

    // Cek apakah hari libur nasional
    const holidayName = isHoliday(currentDate);
    if (holidayName) {
      div.classList.add("holiday");
      div.title = holidayName; // Tooltip untuk nama hari libur
    }

    // Tambahkan event listener untuk klik tanggal
    div.addEventListener('click', () => {
      showDateDescription(currentDate, holidayName);

      // Hapus class selected dari semua tanggal
      document.querySelectorAll('.days div').forEach(el => {
        el.classList.remove('selected');
      });

      // Tambahkan class selected ke tanggal yang diklik
      div.classList.add('selected');
    });
  }
}

function showDateDescription(date, holidayName) {
  const selectedDateEl = document.getElementById('selectedDate');
  const dateInfoEl = document.getElementById('dateInfo');
  const descriptionEl = document.getElementById('dateDescription');

  // Format tanggal dalam bahasa Indonesia
  const dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
  const dayName = dayNames[date.getDay()];
  const dateStr = `${dayName}, ${date.getDate()} ${monthNames[date.getMonth()]} ${date.getFullYear()}`;

  selectedDateEl.textContent = dateStr;

  // Reset class
  descriptionEl.classList.remove('holiday-info', 'today-info');

  // Cek apakah hari ini
  const today = new Date();
  const isToday = date.getFullYear() === today.getFullYear() &&
    date.getMonth() === today.getMonth() &&
    date.getDate() === today.getDate();

  if (holidayName) {
    dateInfoEl.innerHTML = `<strong>Hari Libur Nasional</strong><br>${holidayName}`;
    descriptionEl.classList.add('holiday-info');
  } else if (isToday) {
    dateInfoEl.innerHTML = `Hari ini`;
    descriptionEl.classList.add('today-info');
  } else {
    // Cek apakah hari weekend
    if (date.getDay() === 0 || date.getDay() === 6) {
      dateInfoEl.innerHTML = `Akhir pekan`;
    } else {
      dateInfoEl.innerHTML = `Hari kerja`;
    }
  }
}

// Panggil fungsi untuk menampilkan kalender
displayCalendar();

previous.addEventListener("click", () => {
  days.innerHTML = "";

  if (month < 0) {
    month = 11;
    year = year - 1;
  }
  month = month - 1;
  date.setMonth(month);
  displayCalendar();
});

next.addEventListener("click", () => {
  days.innerHTML = "";

  if (month > 11) {
    month = 0;
    year = year + 1;
  }

  month = month + 1;
  date.setMonth(month);

  displayCalendar();
});