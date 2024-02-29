<!-- Important sidebarcode -->
<div class="sidebar-wrapper">
      <div class="sidebar">
            <div class="logo-wrapper logo-sidebar">
                  <img src="{{ asset('images/Logo.jpg') }}" alt="logo" />
            </div>

            <div class="nav-items">
                  <a href="{{route('home')}}" class="nav-item {{ request()->is('home') ? ' active' : 'home' }}">
                        <div class="nav-item__icon">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.33333 2.5H2.5V8.33333H8.33333V2.5Z" stroke="#7E7E7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.5001 2.5H11.6667V8.33333H17.5001V2.5Z" stroke="#7E7E7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.5001 11.6667H11.6667V17.5001H17.5001V11.6667Z" stroke="#7E7E7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8.33333 11.6667H2.5V17.5001H8.33333V11.6667Z" stroke="#7E7E7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                        </div>
                        <div class="nav-item__label">
                              Dashboard
                        </div>
                  </a>


                  <a href="{{route('Category.index')}}" class="nav-item  {{ request()->is('Category/index') ? ' active' : '' }}">
                        <div class="nav-item__icon">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.75 7.83336L6.25 3.50836" stroke="#7E7E7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.5 13.3334V6.66669C17.4997 6.37442 17.4225 6.08736 17.2763 5.83432C17.13 5.58128 16.9198 5.37116 16.6667 5.22502L10.8333 1.89169C10.58 1.74541 10.2926 1.6684 10 1.6684C9.70744 1.6684 9.42003 1.74541 9.16667 1.89169L3.33333 5.22502C3.08022 5.37116 2.86998 5.58128 2.72372 5.83432C2.57745 6.08736 2.5003 6.37442 2.5 6.66669V13.3334C2.5003 13.6256 2.57745 13.9127 2.72372 14.1657C2.86998 14.4188 3.08022 14.6289 3.33333 14.775L9.16667 18.1084C9.42003 18.2546 9.70744 18.3316 10 18.3316C10.2926 18.3316 10.58 18.2546 10.8333 18.1084L16.6667 14.775C16.9198 14.6289 17.13 14.4188 17.2763 14.1657C17.4225 13.9127 17.4997 13.6256 17.5 13.3334Z" stroke="#7E7E7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2.7251 5.79999L10.0001 10.0083L17.2751 5.79999" stroke="#7E7E7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10 18.4V10" stroke="#7E7E7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                        </div>
                        <div class="nav-item__label">
                              Category
                        </div>
                  </a>


                  <a href="{{route('activity.index')}}" class="nav-item {{request()->is('activity/index') ? ' active' : '' }}">

                        <div class="nav-item__icon">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.33333 12.8542H9.85417V12.3333V6.1875H16C17.554 6.1875 18.8125 7.44598 18.8125 9V15.9792H18.1875V14V13.4792H17.6667H2.66667H2.14583V14V15.9792H1.52083V4.52083H2.14583V12.3333V12.8542H2.66667H9.33333ZM17.6667 12.8542H18.1875V12.3333V9C18.1875 7.79569 17.2043 6.8125 16 6.8125H11H10.4792V7.33333V12.3333V12.8542H11H17.6667ZM7.97917 9C7.97917 10.0957 7.09568 10.9792 6 10.9792C4.90431 10.9792 4.02083 10.0957 4.02083 9C4.02083 7.90431 4.90431 7.02083 6 7.02083C7.09568 7.02083 7.97917 7.90431 7.97917 9ZM7.35417 9C7.35417 8.25402 6.74598 7.64583 6 7.64583C5.25402 7.64583 4.64583 8.25402 4.64583 9C4.64583 9.74598 5.25402 10.3542 6 10.3542C6.74598 10.3542 7.35417 9.74598 7.35417 9Z" fill="#7E7E7E" stroke="#7E7E7E" stroke-width="1.04167" />
                              </svg>
                        </div>
                        <div class="nav-item__label">
                              Activity
                        </div>

                  </a>


                  <a class="nav-item {{request()->is('wildLife/index') ? ' active' : '' }}" href="{{route('wildLife.index')}}">
                        <div class="nav-item__icon">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.29147 8.1875H7.29167C8.63657 8.1875 9.86824 8.50325 10.9963 9.13238C12.0671 9.72957 12.71 10.6207 12.946 11.8437C12.9577 11.9132 12.9472 11.9659 12.8813 12.0401C12.8193 12.1099 12.7494 12.1461 12.6261 12.1458H12.625H1.95834C1.83473 12.1458 1.76427 12.1094 1.70203 12.0393C1.63591 11.9648 1.62577 11.9124 1.63735 11.8438C1.87332 10.6201 2.51624 9.72872 3.58702 9.13155C4.71504 8.50245 5.94664 8.18698 7.29147 8.1875ZM14.375 1C14.6111 1 14.8092 1.08 14.9692 1.24C15.1292 1.4 15.2089 1.59778 15.2083 1.83334L14.375 1ZM17.5417 5.47917H10.048L10.0177 5.21332C10.0176 5.21311 10.0176 5.21289 10.0176 5.21268C10.0055 5.1027 10.0302 5.02778 10.0948 4.95196C10.1543 4.88212 10.2129 4.85395 10.3113 4.85417H10.3125H13.5417H14.0625V4.33334V1.83334C14.0625 1.72866 14.0923 1.66515 14.15 1.60745C14.2076 1.54983 14.2704 1.52059 14.3738 1.52084H14.375C14.4797 1.52084 14.5432 1.5506 14.6009 1.60829C14.6585 1.66591 14.6877 1.72877 14.6875 1.83211V1.83334V4.33334V4.85417H15.2083H18.4583C18.5659 4.85417 18.6345 4.8858 18.7006 4.95744C18.7622 5.02411 18.7856 5.08842 18.774 5.19248L18.774 5.19248L18.7734 5.19801L17.4825 18.066C17.4558 18.2696 17.368 18.4412 17.1999 18.5959C17.0432 18.74 16.8614 18.8125 16.625 18.8125H15.7292V18.1875H16.375H16.8464L16.8933 17.7185L18.0599 6.05183L18.1172 5.47917H17.5417ZM11.2717 10.9994L11.6925 10.6943C11.2224 10.0459 10.569 9.57209 9.75881 9.26331C8.96769 8.96182 8.1301 8.8125 7.25 8.8125C6.37041 8.8125 5.53287 8.96184 4.74132 9.26327C3.93049 9.57204 3.27707 10.046 2.80793 10.6948L2.21074 11.5208H3.23H11.0051H11.2708H11.2717V11V10.9994ZM1.52084 15.1679V15.1667C1.52084 15.062 1.5506 14.9985 1.60829 14.9408C1.66591 14.8832 1.72877 14.8539 1.83211 14.8542H1.83334H12.6667C12.7713 14.8542 12.8349 14.8839 12.8926 14.9416C12.9502 14.9992 12.9794 15.0621 12.9792 15.1654V15.1667C12.9792 15.2713 12.9494 15.3349 12.8917 15.3926C12.8341 15.4502 12.7712 15.4794 12.6679 15.4792H12.6667H1.83334C1.72866 15.4792 1.66515 15.4494 1.60745 15.3917C1.54983 15.3341 1.52059 15.2712 1.52084 15.1679ZM1.52084 18.5012V18.5C1.52084 18.3953 1.5506 18.3318 1.60829 18.2741C1.66591 18.2165 1.72877 18.1873 1.83211 18.1875H1.83334H12.6667C12.7713 18.1875 12.8349 18.2173 12.8926 18.275C12.9502 18.3326 12.9794 18.3954 12.9792 18.4988V18.5C12.9792 18.6047 12.9494 18.6682 12.8917 18.7259C12.8341 18.7835 12.7712 18.8127 12.6679 18.8125H12.6667H1.83334C1.72866 18.8125 1.66515 18.7827 1.60745 18.7251C1.54983 18.6674 1.52059 18.6046 1.52084 18.5012Z" fill="#7E7E7E" stroke="#7E7E7E" stroke-width="1.04167" />
                              </svg>
                        </div>

                        <div class="nav-item__label">
                              Wild Life
                        </div>
                  </a>


                  <a class="nav-item {{request()->is('wildSpecies/index') ? ' active' : '' }}" href="{{route('wildSpecies.index')}}">
                        <div class="nav-item__icon">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.29147 8.1875H7.29167C8.63657 8.1875 9.86824 8.50325 10.9963 9.13238C12.0671 9.72957 12.71 10.6207 12.946 11.8437C12.9577 11.9132 12.9472 11.9659 12.8813 12.0401C12.8193 12.1099 12.7494 12.1461 12.6261 12.1458H12.625H1.95834C1.83473 12.1458 1.76427 12.1094 1.70203 12.0393C1.63591 11.9648 1.62577 11.9124 1.63735 11.8438C1.87332 10.6201 2.51624 9.72872 3.58702 9.13155C4.71504 8.50245 5.94664 8.18698 7.29147 8.1875ZM14.375 1C14.6111 1 14.8092 1.08 14.9692 1.24C15.1292 1.4 15.2089 1.59778 15.2083 1.83334L14.375 1ZM17.5417 5.47917H10.048L10.0177 5.21332C10.0176 5.21311 10.0176 5.21289 10.0176 5.21268C10.0055 5.1027 10.0302 5.02778 10.0948 4.95196C10.1543 4.88212 10.2129 4.85395 10.3113 4.85417H10.3125H13.5417H14.0625V4.33334V1.83334C14.0625 1.72866 14.0923 1.66515 14.15 1.60745C14.2076 1.54983 14.2704 1.52059 14.3738 1.52084H14.375C14.4797 1.52084 14.5432 1.5506 14.6009 1.60829C14.6585 1.66591 14.6877 1.72877 14.6875 1.83211V1.83334V4.33334V4.85417H15.2083H18.4583C18.5659 4.85417 18.6345 4.8858 18.7006 4.95744C18.7622 5.02411 18.7856 5.08842 18.774 5.19248L18.774 5.19248L18.7734 5.19801L17.4825 18.066C17.4558 18.2696 17.368 18.4412 17.1999 18.5959C17.0432 18.74 16.8614 18.8125 16.625 18.8125H15.7292V18.1875H16.375H16.8464L16.8933 17.7185L18.0599 6.05183L18.1172 5.47917H17.5417ZM11.2717 10.9994L11.6925 10.6943C11.2224 10.0459 10.569 9.57209 9.75881 9.26331C8.96769 8.96182 8.1301 8.8125 7.25 8.8125C6.37041 8.8125 5.53287 8.96184 4.74132 9.26327C3.93049 9.57204 3.27707 10.046 2.80793 10.6948L2.21074 11.5208H3.23H11.0051H11.2708H11.2717V11V10.9994ZM1.52084 15.1679V15.1667C1.52084 15.062 1.5506 14.9985 1.60829 14.9408C1.66591 14.8832 1.72877 14.8539 1.83211 14.8542H1.83334H12.6667C12.7713 14.8542 12.8349 14.8839 12.8926 14.9416C12.9502 14.9992 12.9794 15.0621 12.9792 15.1654V15.1667C12.9792 15.2713 12.9494 15.3349 12.8917 15.3926C12.8341 15.4502 12.7712 15.4794 12.6679 15.4792H12.6667H1.83334C1.72866 15.4792 1.66515 15.4494 1.60745 15.3917C1.54983 15.3341 1.52059 15.2712 1.52084 15.1679ZM1.52084 18.5012V18.5C1.52084 18.3953 1.5506 18.3318 1.60829 18.2741C1.66591 18.2165 1.72877 18.1873 1.83211 18.1875H1.83334H12.6667C12.7713 18.1875 12.8349 18.2173 12.8926 18.275C12.9502 18.3326 12.9794 18.3954 12.9792 18.4988V18.5C12.9792 18.6047 12.9494 18.6682 12.8917 18.7259C12.8341 18.7835 12.7712 18.8127 12.6679 18.8125H12.6667H1.83334C1.72866 18.8125 1.66515 18.7827 1.60745 18.7251C1.54983 18.6674 1.52059 18.6046 1.52084 18.5012Z" fill="#7E7E7E" stroke="#7E7E7E" stroke-width="1.04167" />
                              </svg>
                        </div>

                        <div class="nav-item__label">
                              Wild Species
                        </div>
                  </a>


                  <a class="nav-item {{(request()->is('nationalPark/index') || request()->is('nationalPark/index')) ? ' active' : '' }}" href="{{route('nationalPark.index')}}">
                        <div class="nav-item__icon">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.33333 12.8542H9.85417V12.3333V6.1875H16C17.554 6.1875 18.8125 7.44598 18.8125 9V15.9792H18.1875V14V13.4792H17.6667H2.66667H2.14583V14V15.9792H1.52083V4.52083H2.14583V12.3333V12.8542H2.66667H9.33333ZM17.6667 12.8542H18.1875V12.3333V9C18.1875 7.79569 17.2043 6.8125 16 6.8125H11H10.4792V7.33333V12.3333V12.8542H11H17.6667ZM7.97917 9C7.97917 10.0957 7.09568 10.9792 6 10.9792C4.90431 10.9792 4.02083 10.0957 4.02083 9C4.02083 7.90431 4.90431 7.02083 6 7.02083C7.09568 7.02083 7.97917 7.90431 7.97917 9ZM7.35417 9C7.35417 8.25402 6.74598 7.64583 6 7.64583C5.25402 7.64583 4.64583 8.25402 4.64583 9C4.64583 9.74598 5.25402 10.3542 6 10.3542C6.74598 10.3542 7.35417 9.74598 7.35417 9Z" fill="#7E7E7E" stroke="#7E7E7E" stroke-width="1.04167" />
                              </svg>
                        </div>

                        <div class="nav-item__label">
                              National Park
                        </div>
                  </a>



            </div>
      </div>
</div>