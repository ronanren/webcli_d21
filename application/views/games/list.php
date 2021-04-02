<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Cover
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Title
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Release date
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Action
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php foreach ($games as $game) : ?>
              <tr class="item_row">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex-shrink-0 h-32 w-auto">
                    <img class="h-32 w-auto" src="<?php echo $game['couverture']; ?>" alt="<?php echo $game['titre']; ?>" />
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap"><?php echo $game['titre']; ?></td>
                <td class="px-6 py-4 whitespace-nowrap"><?php echo $game['sortie']; ?></td>
                <td class="px-6 py-4 whitespace-nowrap flex flex-col justify-center h-40">
                  <?php if (null != $this->session->userdata("user_id")) { ?>
                    <a href="<?php echo base_url("Collection/AddToCollection/" . $game['id']); ?>" class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center">Add to your collection</a>
                  <?php } ?>
                  <a href="<?php echo base_url("games/details/" . $game['id']); ?>" class="py-2 px-4 mt-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center">See details</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>