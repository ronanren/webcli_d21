<div class="relative bg-white overflow-hidden">
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="<?php echo $game->couverture; ?>" alt="">
  </div>
  <div class="max-w-7xl mx-auto">
    <div class="relative z-10 pb-12 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-32 xl:pb-48">
      <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
        <polygon points="50,0 100,0 50,100 0,100" />
      </svg>
      <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-32">
        <div class="sm:text-center lg:text-left">
          <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline"><?php echo $game->titre; ?></span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            <?php echo $game->description; ?>
          </p>
          <div class="mt-5 sm:mt-8 sm:mr-3 sm:flex sm:justify-center lg:justify-start">
            <?php if (null != $this->session->userdata("user_id")) { ?>
              <div class="rounded-md shadow">
                <?php if (!$added) { ?>
                  <a href="<?php echo base_url("Collection/AddToCollection/" . $game->id); ?>" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                    Add to your collection
                  </a>
                <?php } else { ?>
                  <a href="<?php echo base_url("Collection/RemoveToCollection/" . $game->id); ?>" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                    Remove from your collection
                  </a>
                <?php } ?>
              </div>
            <?php } ?>
            <div class="mt-3 sm:mt-0">
              <a href="<?php echo base_url("games"); ?>" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                Back to the list
              </a>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

</div>