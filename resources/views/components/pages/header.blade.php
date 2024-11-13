<style>
    .highlight {
        background-color: yellow;
        font-weight: bold;
    }
</style>

<header class="nxl-header">
    <div class="header-wrapper">
        <div class="header-left d-flex align-items-center gap-4">
            <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </a>
            <div class="nxl-navigation-toggle">
                <a href="javascript:void(0);" id="menu-mini-button">
                    <i class="feather-align-left"></i>
                </a>
                <a href="javascript:void(0);" id="menu-expend-button" style="display: none">
                    <i class="feather-arrow-right"></i>
                </a>
            </div>
            <div class="nxl-lavel-mega-menu-toggle d-flex d-lg-none">
                <a href="javascript:void(0);" id="nxl-lavel-mega-menu-open">
                    <i class="feather-align-left"></i>
                </a>
            </div>
        </div>
        <div class="header-right ms-auto">
            <div class="d-flex align-items-center">
                <div class="nxl-h-item d-none d-sm-flex">
                    <div class="full-screen-switcher">
                        <a href="javascript:void(0);" class="nxl-head-link me-0" onclick="$('body').fullScreenHelper('toggle');">
                            <i class="feather-maximize maximize"></i>
                            <i class="feather-minimize minimize"></i>
                        </a>
                    </div>
                </div>
                <div class="nxl-h-item dark-light-theme">
                    <a href="javascript:void(0);" class="nxl-head-link me-0 dark-button">
                        <i class="feather-moon"></i>
                    </a>
                    <a href="javascript:void(0);" class="nxl-head-link me-0 light-button" style="display: none">
                        <i class="feather-sun"></i>
                    </a>
                </div>
                <div class="dropdown nxl-h-item">
                    <a href="javascript:void(0);" data-bs-toggle="dropdown" role="button" data-bs-auto-close="outside">
                        <img src="https://crm.softbooking.uz/resource/img/user.avif" alt="user-image" class="img-fluid user-avtar me-0">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
                        <div class="dropdown-header">
                            <div class="d-flex align-items-center">
                                <img src="https://crm.softbooking.uz/resource/img/user.avif" alt="user-image" class="img-fluid user-avtar">
                                <div>
                                    <h6 class="m-0 fs-14">{{ auth()->user()->full_name }}</h6>
                                    <span class="fs-12">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        @auth
                            <form class="d-block" action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="feather-log-out"></i>
                                    Выйти
                                </button>
                            </form>
                        @endauth

                        <div class="dropdown-divider"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<script>
    const searchInput = document.getElementById('searchInput');
    const body = document.body;
    const closeButton = document.querySelector('.search-count');

    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.trim();

        clearHighlights();

        if (searchTerm !== "") {
            const matchCount = highlightText(body, searchTerm);
            closeButton.textContent = `0/${matchCount}`;
        } else {
            closeButton.textContent = '';
        }
    });

    function clearHighlights() {
        const highlightedElements = document.querySelectorAll('.highlight');
        highlightedElements.forEach(element => {
            const parent = element.parentNode;
            parent.replaceChild(document.createTextNode(element.textContent), element);
            parent.normalize();
        });
    }

    function highlightText(element, searchTerm) {
        let matchCount = 0;

        if (element.nodeType === Node.TEXT_NODE) {
            const index = element.textContent.toLowerCase().indexOf(searchTerm.toLowerCase());
            if (index !== -1) {
                const highlightedSpan = document.createElement('span');
                highlightedSpan.classList.add('highlight');
                highlightedSpan.textContent = element.textContent.substring(index, index + searchTerm.length);

                const afterText = element.splitText(index);
                afterText.textContent = afterText.textContent.substring(searchTerm.length);

                element.parentNode.insertBefore(highlightedSpan, afterText);
                matchCount++;
            }
        } else if (element.nodeType === Node.ELEMENT_NODE && element.childNodes) {
            element.childNodes.forEach(child => {
                matchCount += highlightText(child, searchTerm); // Har bir chaqiriqda mos tushgan sonni qo'shish
            });
        }

        return matchCount; // Umumiy topilgan natijalarni qaytarish
    }

    // Time
    let reminderTriggered = false;
    let timerInterval;

    document.querySelector(".js-taymer").addEventListener("click", evt => {
        evt.preventDefault();

        if (!reminderTriggered) {
            let startTime = new Date();
            reminderTriggered = true;

            const padZero = (num) => (num < 10 ? "0" + num : num);

            const reminder = (number) => {
                if (number >= 1) {
                    document.querySelector(".js-timeout").textContent = Number(number);
                }
            };

            const updateTime = () => {
                const currentTime = new Date();
                const timeDifference = currentTime - startTime;

                let hours = Math.floor((timeDifference / (1000 * 60 * 60)) % 24);
                let minutes = Math.floor((timeDifference / (1000 * 60)) % 60);
                let seconds = Math.floor((timeDifference / 1000) % 60);

                hours = padZero(hours);
                minutes = padZero(minutes);
                seconds = padZero(seconds);

                if (reminderTriggered) {
                    document.querySelector('.js-taymer-manage').textContent = `${hours}:${minutes}:${seconds}`;
                    document.querySelector(".js-taymer").textContent = "Остановить таймер";
                }

                reminder(hours);
            };
            updateTime();
            timerInterval = setInterval(updateTime, 1000);

        } else {
            clearInterval(timerInterval);
            reminderTriggered = false;
            document.querySelector('.js-taymer-manage').textContent = "Таймеры не запущены!";
            document.querySelector(".js-taymer").textContent = "Запустить таймер";
        }
    });
</script>
