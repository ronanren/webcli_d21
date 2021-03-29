<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Couverture
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Titre
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Sortie
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
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>