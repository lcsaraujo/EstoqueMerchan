<style>
  .logo{
    align-items: center !important;
    display: flex !important;
    justify-content: center !important;
  }
</style>
<!-- <nav class="navbar lg:menu-vertical bg-base-300 text-base-content border-y-4 border-neutral static"> 
    
      <ul class=" menu menu-vertical text-base-content focus:text-base-content font-semibold static">
        <li class="ms-10 justify-left lg:m-0  hover:border-base-content"> <a href="home.php"><i class="fa fa-home"></i><span class="hidden md:block lg:block font-sans uppercase">Inicio</span> </a> </li>
          <li class="dropdown dropdown-hover justify-left lg:m-0 dropdown-start  mx-12  hover:border-base-content "><a href="home.php?acao=ver-produto"><i class="fa-solid fa-shop focus:text-base-content"></i> <span class="hidden md:block lg:block font-sans uppercase focus:text-base-content">Produtos</span> <b class="caret"></b></a>

          </li>
          <li class="dropdown dropdown-hover justify-left lg:m-0 dropdown-end  hover:border-base-content"><a href="home.php?acao=ver-fornecedores"> <i class="fa-solid fa-truck-field"></i><span class="hidden md:block lg:block font-sans uppercase">Fornecedores</span> <b class="caret"></b></a>

          </li>
      </ul>    
</nav> -->

<div class="flex flex-1 bg-base-100 h-screen">
    <div class="hidden md:flex md:w-64 md:flex-col">
        <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-base-200">
            <!-- <div class="flex items-center flex-shrink-0 px-4">
                <img class="w-auto h-8" src="https://landingfoliocom.imgix.net/store/collection/clarity-dashboard/images/logo.svg" alt="" />
            </div>


            <div class="px-4 mt-6">
                <hr class="border-gray-200" />
            </div> -->

            <div class="flex flex-col flex-1 px-2 bg-base-200">
                <div class="space-y-4">
                    <nav class="flex-1 space-y-2">
                        <a href="home.php" title="" class="flex items-center px-4 py-2.5 text-sm font-medium  transition-all duration-200 bg-indigo-600 rounded-lg group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4 text-white" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>

                        <a href="home.php?acao=ver-produto" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200  hover:text-white rounded-lg hover:bg-indigo-600 group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Produtos
                        </a>

                        <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200  hover:text-white rounded-lg hover:bg-indigo-600 group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Brindes
                        </a>

                        <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200  hover:text-white rounded-lg hover:bg-indigo-600 group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Fornecedores
                            <svg class="w-4 h-6 ml-auto text-gray-400 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                    </nav>

                    <hr class="border-gray-200" />

                    <nav class="flex-1 space-y-2">
                        <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200  hover:text-white rounded-lg hover:bg-indigo-600 group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                            </svg>
                            Pedidos
                        </a>

                        <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200  hover:text-white rounded-lg hover:bg-indigo-600 group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            Envios
                        </a>

                    </nav>

                    <hr class="border-gray-200" />

                    <nav class="flex-1 space-y-2">
                        <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200  hover:text-white rounded-lg hover:bg-indigo-600 group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Entrada NFE
                        </a>
                    </nav>
                </div>


            </div>
        </div>
    </div>

    <div class="flex flex-col flex-1">
        <main>
            <div class="py-6">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
                  
