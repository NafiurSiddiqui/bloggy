<!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
<button type="button"
    class="toggle-btn dark:bg-darkToggleBtn bg-lightToggleBtn relative inline-flex flex-shrink-0 h-6 w-11  rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none items-center "
    role="switch" aria-checked="false">
    <span class="sr-only">Use setting</span>
    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
    <span
        class="switch-panel translate-x-0 pointer-events-none relative inline-block h-5 w-5 rounded-full dark:bg-darkToggleSwitch bg-lightToggleSwitch shadow transform ring-0 transition ease-in-out duration-200 ">
        <!-- Enabled: "opacity-0 ease-out duration-100", Not Enabled: "opacity-100 ease-in duration-200" -->
        <span
            class="dark-switch opacity-100 ease-in duration-200 absolute inset-0 h-full w-full flex items-center justify-center transition-opacity p-[2px]"
            aria-hidden="true">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.958 15.3251C21.162 14.8391 20.579 14.4251 20.09 14.6411C19.1124 15.0697 18.0564 15.2903 16.989 15.2891C12.804 15.2891 9.412 11.9651 9.412 7.86406C9.41157 6.47956 9.80487 5.12349 10.546 3.95406C10.83 3.50606 10.489 2.88606 9.969 3.01806C5.96 4.04106 3 7.61306 3 11.8621C3 16.9091 7.175 21.0001 12.326 21.0001C16.226 21.0001 19.566 18.6551 20.958 15.3251Z"
                        fill="#C5B270" />
                </svg>


            </svg>


        </span>
        <!-- Enabled: "opacity-100 ease-in duration-200", Not Enabled: "opacity-0 ease-out duration-100" -->
        <span
            class="light-switch opacity-0 ease-out duration-100 absolute inset-0 h-full w-full flex items-center justify-center transition-opacity p-[2px]"
            aria-hidden="true">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 7C10.6739 7 9.40215 7.52678 8.46447 8.46447C7.52678 9.40215 7 10.6739 7 12C7 13.3261 7.52678 14.5979 8.46447 15.5355C9.40215 16.4732 10.6739 17 12 17C13.3261 17 14.5979 16.4732 15.5355 15.5355C16.4732 14.5979 17 13.3261 17 12C17 10.6739 16.4732 9.40215 15.5355 8.46447C14.5979 7.52678 13.3261 7 12 7Z"
                    fill="#FFD233" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M12 1C12.2652 1 12.5196 1.10536 12.7071 1.29289C12.8946 1.48043 13 1.73478 13 2V3C13 3.26522 12.8946 3.51957 12.7071 3.70711C12.5196 3.89464 12.2652 4 12 4C11.7348 4 11.4804 3.89464 11.2929 3.70711C11.1054 3.51957 11 3.26522 11 3V2C11 1.73478 11.1054 1.48043 11.2929 1.29289C11.4804 1.10536 11.7348 1 12 1ZM3.293 3.293C3.48053 3.10553 3.73484 3.00021 4 3.00021C4.26516 3.00021 4.51947 3.10553 4.707 3.293L6.207 4.793C6.38916 4.9816 6.48995 5.2342 6.48767 5.4964C6.4854 5.7586 6.38023 6.00941 6.19482 6.19482C6.00941 6.38023 5.7586 6.4854 5.4964 6.48767C5.2342 6.48995 4.9816 6.38916 4.793 6.207L3.293 4.707C3.10553 4.51947 3.00021 4.26516 3.00021 4C3.00021 3.73484 3.10553 3.48053 3.293 3.293ZM20.707 3.293C20.8945 3.48053 20.9998 3.73484 20.9998 4C20.9998 4.26516 20.8945 4.51947 20.707 4.707L19.207 6.207C19.1148 6.30251 19.0044 6.37869 18.8824 6.4311C18.7604 6.48351 18.6292 6.5111 18.4964 6.51225C18.3636 6.5134 18.2319 6.4881 18.109 6.43782C17.9862 6.38754 17.8745 6.31329 17.7806 6.2194C17.6867 6.1255 17.6125 6.01385 17.5622 5.89095C17.5119 5.76806 17.4866 5.63638 17.4877 5.5036C17.4889 5.37082 17.5165 5.2396 17.5689 5.1176C17.6213 4.99559 17.6975 4.88525 17.793 4.793L19.293 3.293C19.4805 3.10553 19.7348 3.00021 20 3.00021C20.2652 3.00021 20.5195 3.10553 20.707 3.293ZM1 12C1 11.7348 1.10536 11.4804 1.29289 11.2929C1.48043 11.1054 1.73478 11 2 11H3C3.26522 11 3.51957 11.1054 3.70711 11.2929C3.89464 11.4804 4 11.7348 4 12C4 12.2652 3.89464 12.5196 3.70711 12.7071C3.51957 12.8946 3.26522 13 3 13H2C1.73478 13 1.48043 12.8946 1.29289 12.7071C1.10536 12.5196 1 12.2652 1 12ZM20 12C20 11.7348 20.1054 11.4804 20.2929 11.2929C20.4804 11.1054 20.7348 11 21 11H22C22.2652 11 22.5196 11.1054 22.7071 11.2929C22.8946 11.4804 23 11.7348 23 12C23 12.2652 22.8946 12.5196 22.7071 12.7071C22.5196 12.8946 22.2652 13 22 13H21C20.7348 13 20.4804 12.8946 20.2929 12.7071C20.1054 12.5196 20 12.2652 20 12ZM6.207 17.793C6.39447 17.9805 6.49979 18.2348 6.49979 18.5C6.49979 18.7652 6.39447 19.0195 6.207 19.207L4.707 20.707C4.5184 20.8892 4.2658 20.99 4.0036 20.9877C3.7414 20.9854 3.49059 20.8802 3.30518 20.6948C3.11977 20.5094 3.0146 20.2586 3.01233 19.9964C3.01005 19.7342 3.11084 19.4816 3.293 19.293L4.793 17.793C4.98053 17.6055 5.23484 17.5002 5.5 17.5002C5.76516 17.5002 6.01947 17.6055 6.207 17.793ZM17.793 17.793C17.9805 17.6055 18.2348 17.5002 18.5 17.5002C18.7652 17.5002 19.0195 17.6055 19.207 17.793L20.707 19.293C20.8892 19.4816 20.99 19.7342 20.9877 19.9964C20.9854 20.2586 20.8802 20.5094 20.6948 20.6948C20.5094 20.8802 20.2586 20.9854 19.9964 20.9877C19.7342 20.99 19.4816 20.8892 19.293 20.707L17.793 19.207C17.6055 19.0195 17.5002 18.7652 17.5002 18.5C17.5002 18.2348 17.6055 17.9805 17.793 17.793ZM12 20C12.2652 20 12.5196 20.1054 12.7071 20.2929C12.8946 20.4804 13 20.7348 13 21V22C13 22.2652 12.8946 22.5196 12.7071 22.7071C12.5196 22.8946 12.2652 23 12 23C11.7348 23 11.4804 22.8946 11.2929 22.7071C11.1054 22.5196 11 22.2652 11 22V21C11 20.7348 11.1054 20.4804 11.2929 20.2929C11.4804 20.1054 11.7348 20 12 20Z"
                    fill="#FFD233" />
            </svg>

        </span>
    </span>
</button>


<script>
    const toggleBtn = document.querySelector('.toggle-btn');
    const switchPanel = document.querySelector('.switch-panel');
    const darkSwitch = document.querySelector('.dark-switch');
    const lightSwitch = document.querySelector('.light-switch');
    const htmlDOM = document.querySelector('html');

    toggleBtn.addEventListener('click', () => {

        if (htmlDOM.classList.contains('dark')) {
            htmlDOM.classList.remove('dark');
        } else {
            htmlDOM.classList.add('dark');
        }


        // if (toggleBtn.classList.contains('dark:bg-darkToggleBtn')) {
        //     toggleBtn.classList.remove('dark:bg-darkToggleBtn');
        //     toggleBtn.classList.add('lightTogglebtn');

        // } else {
        //     toggleBtn.classList.remove('lightTogglebtn');
        //     toggleBtn.classList.add('dark:bg-darkToggleBtn');
        // }

        if (switchPanel.classList.contains('translate-x-0')) {
            switchPanel.classList.remove('translate-x-0');
            switchPanel.classList.add('translate-x-5');
        } else {
            switchPanel.classList.remove('translate-x-5');
            switchPanel.classList.add('translate-x-0');
        }

        if (darkSwitch.classList.contains('opacity-100')) {

            darkSwitch.classList.remove('opacity-100', 'ease-in', 'duration-200');
            darkSwitch.classList.add('opacity-0', 'ease-out', 'duration-100');

        } else {
            darkSwitch.classList.remove('opacity-0', 'ease-out', 'duration-100');
            darkSwitch.classList.add('opacity-100', 'ease-in', 'duration-200');

        }

        if (lightSwitch.classList.contains('opacity-100')) {
            lightSwitch.classList.remove('opacity-100', 'ease-in', 'duration-200');
            lightSwitch.classList.add('opacity-0', 'ease-out', 'duration-100');
        } else {
            lightSwitch.classList.add('opacity-100', 'ease-in', 'duration-200');
            lightSwitch.classList.remove('opacity-0', 'ease-out', 'duration-100');
        }


    });
</script>
