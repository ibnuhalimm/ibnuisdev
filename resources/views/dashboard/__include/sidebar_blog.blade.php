<div class="hidden xl:block xl:w-1/6">
    <ul>
        <li class="block mb-3">
            <a href="{{ route('dashboard.post.index') }}" class="inline-flex @if (Request::is('home/post*')) text-ib-three @else text-gray-900 @endif hover:text-ib-three">
                <svg class="w-4 h-4 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Posts
            </a>
        </li>
        <li class="block mb-3">
            <a href="{{ route('dashboard.old-page.index') }}" class="inline-flex @if (Request::is('home/old-page*')) text-ib-three @else text-gray-900 @endif hover:text-ib-three">
                <svg class="w-4 h-4 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                </svg>
                Redirect Old Pages
            </a>
        </li>
        <li class="block mb-3">
            <a href="{{ route('dashboard.share-button.index') }}" class="inline-flex @if (Request::is('home/share-button*')) text-ib-three @else text-gray-900 @endif hover:text-ib-three">
                <svg class="w-4 h-4 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                Share Buttons
            </a>
        </li>
        <li class="block mb-3">
            <a href="{{ route('dashboard.short-url.index') }}" class="inline-flex @if (request()->routeIs('dashboard.short-url.index')) text-ib-three @else text-gray-900 @endif hover:text-ib-three">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                </svg>
                Short URL
            </a>
        </li>
    </ul>
</div>