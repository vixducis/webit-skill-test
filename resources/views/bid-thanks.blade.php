<x-app title="Thanks for bidding!">
    <div class="thanks-container" style="background-image: url(<?= asset($bid->item->getImagePath()) ?>)">
        <div class="content">
            <span class="bg-white px-2 2xl:px-4 leading-8 py-1 2xl:py-2 mb-2 text-xl uppercase bold md:text-3xl 2xl:text-6xl">Thanks</span>
            <div class="h-2 md:h-4 2xl:h-12"></div>
            <span class="bg-white px-2 2xl:px-4 py-1 2xl:py-2 text-xl uppercase bold md:text-3xl 2xl:text-6xl">for&nbsp;Bidding!</span>
        </div>
    </div>
</x-app>