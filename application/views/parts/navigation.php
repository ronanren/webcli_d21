<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="<?php echo base_url("games"); ?>" class="<?php echo $this->router->fetch_class() == "games" ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 rounded-md text-sm font-medium">Games</a>

                        <?php if (null != $this->session->userdata("user_id")) { ?>

                            <a href="<?php echo base_url("collection"); ?>" class="<?php echo $this->router->fetch_class() == "collection" ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 rounded-md text-sm font-medium">Collection</a>

                            <?php if ($this->session->userdata("user_role") == "admin") { ?>
                                <a href="<?php echo base_url("administration"); ?>" class="<?php echo $this->router->fetch_class() == "administration" ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> px-3 py-2 rounded-md text-sm font-medium">Administration</a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <?php if (null != $this->session->userdata("user_id")) { ?>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                </button>
                            </div>

                            <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu" id="user-menu">
                                <a href="<?php echo base_url('user/profile'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>

                                <a href="<?php echo base_url('user/user_logout'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                            <a href="<?php echo base_url('user/login_view'); ?>" class="whitespace-nowrap text-base font-medium text-gray-200 hover:text-white">
                                Sign in
                            </a>
                            <a href="<?php echo base_url('user'); ?>" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                Sign up
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false" id="menu-button">
                    <span class="sr-only">Open main menu</span>
                    <!--
			  Heroicon name: outline/menu

			  Menu open: "hidden", Menu closed: "block"
			-->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
			  Heroicon name: outline/x

			  Menu open: "block", Menu closed: "hidden"
			-->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="<?php echo base_url("games"); ?>" class="<?php echo $this->router->fetch_class() == "games" ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> block px-3 py-2 rounded-md text-base font-medium">Games</a>

            <?php if (null != $this->session->userdata("user_id")) { ?>
                <a href="<?php echo base_url("collection"); ?>" class="<?php echo $this->router->fetch_class() == "collection" ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> block px-3 py-2 rounded-md text-base font-medium">Collection</a>

                <?php if ($this->session->userdata("user_role") == "admin") { ?>

                    <a href="<?php echo base_url("administration"); ?>" class="<?php echo $this->router->fetch_class() == "administration" ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> block px-3 py-2 rounded-md text-base font-medium">Administration</a>

                <?php } ?>
            <?php } ?>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
            <?php if (null != $this->session->userdata("user_id")) { ?>

                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white"><?php echo $this->session->userdata("user_name") ?></div>
                        <div class="text-sm font-medium leading-none text-gray-400"><?php echo $this->session->userdata("user_role") ?></div>
                    </div>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="<?php echo base_url('user/profile'); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your Profile</a>

                    <a href="<?php echo base_url('user/user_logout'); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign out</a>
                </div>
            <?php } else { ?>
                <div class="flex items-center justify-center flex-1 lg:w-0">
                    <a href="<?php echo base_url('user/login_view'); ?>" class="whitespace-nowrap text-base font-medium text-gray-200 hover:text-white">
                        Sign in
                    </a>
                    <a href="<?php echo base_url('user'); ?>" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        Sign up
                    </a>
                </div>
            <?php } ?>
        </div>


    </div>
</nav>