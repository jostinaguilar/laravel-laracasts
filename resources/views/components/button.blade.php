<a
   {{ $attributes->merge([
       'class' => 'relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2
          text-sm font-medium leading-5 text-gray-700 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-500
          focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-700',
   ]) }}>
    {{ $slot }}
</a>
