<div>
    <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="mb-3">
                    @if (session()->has('message'))

                    <div class="bg-green-300 px-4 py-3 rounded-md shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                            </div>
                            <div class="mt-1">
                                <p>{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>

                    @endif
                </div>

                <form action="#" method="POST" wire:submit.prevent="save">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Business name</label>
                                    <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" wire:model="name">
                                    @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="url" class="block text-sm font-medium text-gray-700">Page URL</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                        {{ config('app.url') }}/
                                        </span>
                                        <input type="text" name="url" id="url" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="myresto" wire:model="url">
                                    </div>
                                    @error('url') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="address" id="address" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="123 Street" wire:model="address">
                                    </div>
                                    @error('address') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone number</label>
                                    <input type="text" name="phone_number" id="phone_number" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" wire:model="phone_number">
                                    @error('phone_number') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" wire:model="email">
                                    @error('email') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="description"></textarea>
                                </div>
                                <p class="mt-2 text-xs text-gray-500">
                                Brief description of your business.
                                </p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                Card image
                                </label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                      @if ($card_image)
                                      <div class="mb-3">
                                          <img src="{{ img($card_image) }}" class="object-contain h-100 w-full">
                                      </div>
                                      @endif

                                      <div class="text-sm text-gray-600">
                                        <label for="card_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                          <span>Upload a file</span>
                                          <input id="card_image" name="card_image" type="file" wire:model="card_image" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                      </div>
                                      <p class="text-xs text-gray-500">
                                        PNG or JPG up to 10MB
                                      </p>
                                    </div>
                                </div>
                            </div>

                            <div>
                              <label class="block text-sm font-medium text-gray-700">
                                Cover image
                              </label>
                              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                  @if ($cover_image)
                                  <div class="mb-3">
                                      <img src="{{ img($cover_image) }}" class="object-contain h-100 w-full">
                                  </div>
                                  @endif

                                  <div class="text-sm text-gray-600">
                                    <label for="cover_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                      <span>Upload a file</span>
                                      <input id="cover_image" name="cover_image" type="file" wire:model="cover_image" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                  </div>
                                  <p class="text-xs text-gray-500">
                                    PNG or JPG up to 10MB
                                  </p>
                                </div>
                              </div>
                            </div>

                        </div>

                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                              Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="mt-5">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Elsewhere</h3>
                </div>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="mb-3">
                    @if (session()->has('elsewhere_message'))

                    <div class="bg-green-300 px-4 py-3 rounded-md shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                            </div>
                            <div class="mt-1">
                                <p>{{ session('elsewhere_message') }}</p>
                            </div>
                        </div>
                    </div>

                    @endif
                </div>

                <form action="#" method="POST" wire:submit.prevent="saveElsewhere">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">

                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="website_url" class="block text-sm font-medium text-gray-700">Website URL</label>
                                    <input type="text" name="website_url" id="website_url" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" wire:model="website_url" placeholder="http://yourwebsite.com">
                                    @error('website_url') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook Page URL</label>
                                    <input type="text" name="facebook" id="facebook" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" wire:model="facebook">
                                    @error('facebook') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="instagram" class="block text-sm font-medium text-gray-700">Instagram Profile URL</label>
                                    <input type="text" name="instagram" id="instagram" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" wire:model="instagram">
                                    @error('instagram') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>


                        </div>


                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>


                    </div>
                </form>

            </div>
        </div>

    </div>


    <div class="mt-10">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Open Hours</h3>
            <p class="mt-1 text-sm text-gray-600">
              Select the days and times your business is open.
            </p>
          </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">

          <div class="mb-3">
            @if (session()->has('opening_hours_message'))

            <div class="bg-green-300 px-4 py-3 rounded-md shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                    </div>
                    <div class="mt-1">
                        <p>{{ session('opening_hours_message') }}</p>
                    </div>
                </div>
            </div>

            @endif
          </div>


          <form action="#" method="POST" wire:submit.prevent="saveOpeningHours">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                @foreach ($opening_hours as $index => $item)
                  <div class="mt-4 space-y-4">
                    <div class="flex items-start">

                        <div class="flex items-center">

                            <div class="flex items-start w-28">
                              <div class="flex items-center h-5">
                                <input id="{{ $item['day'] }}" name="{{ $item['day'] }}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" wire:model="opening_hours.{{ $index }}.enabled">
                              </div>

                              <div class="ml-3 text-sm">
                                <label for="{{ $item['day'] }}" class="font-medium text-gray-700">{{ ucwords($item['day']) }}</label>
                              </div>
                            </div>

                            <div class="ml-3">
                              <input type="text" name="{{ $item['day'] }}_from" id="{{ $item['day'] }}_from" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-16 shadow-sm sm:text-sm border-gray-300 rounded-md" wire:model="opening_hours.{{ $index }}.time_from">
                            </div>

                            <div class="ml-3 text-gray-500">
                                to
                            </div>

                            <div class="ml-3">
                              <input type="text" name="{{ $item['day'] }}_to" id="{{ $item['day'] }}_to" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-16 shadow-sm sm:text-sm border-gray-300 rounded-md" wire:model="opening_hours.{{ $index }}.time_to">
                            </div>

                        </div>

                    </div>
                  </div>
                @endforeach

              </div>

              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Save
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="mt-10">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Amenities</h3>
            <p class="mt-1 text-sm text-gray-600">
              Select the amenities that your place offers.
            </p>
          </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">

          <div class="mb-3">
            @if (session()->has('amenities_message'))

            <div class="bg-green-300 px-4 py-3 rounded-md shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                    </div>
                    <div class="mt-1">
                        <p>{{ session('amenities_message') }}</p>
                    </div>
                </div>
            </div>

            @endif
          </div>


          <form action="#" method="POST" wire:submit.prevent="saveAmenities">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                @foreach ($amenities as $index => $item)
                  <div class="mt-4 space-y-4">
                    <div class="flex items-start">

                        <div class="flex items-center">

                            <div class="flex items-start w-auto">
                              <div class="flex items-center h-5">
                                <input id="{{ $item }}" name="{{ $item }}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" wire:model="amenities_values.{{$item}}">
                              </div>

                              <div class="ml-3 text-sm">
                                <label for="{{ $item }}" class="font-medium text-gray-700">{{ friendlyText($item) }}</label>
                              </div>
                            </div>

                        </div>

                    </div>
                  </div>
                @endforeach

              </div>

              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Save
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="mt-10">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Photos</h3>
            <p class="mt-1 text-sm text-gray-600">
              Upload photos of your place.
            </p>
          </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">

          <div class="mb-3">
            @if (session()->has('images_message'))

            <div class="bg-green-300 px-4 py-3 rounded-md shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                    </div>
                    <div class="mt-1">
                        <p>{{ session('images_message') }}</p>
                    </div>
                </div>
            </div>

            @endif
          </div>


          <form action="#" method="POST" wire:submit.prevent="saveImages">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                    Photos
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                          @foreach ($images as $image)
                          <div class="mb-5">
                              <img src="{{ img($image, 'images/business/') }}" class="object-contain h-100 w-full">
                          </div>
                          @endforeach

                          <div class="text-sm text-gray-600">
                            <label for="images" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                              <span>Upload a file</span>
                              <input id="images" name="images" type="file" wire:model="images" class="sr-only" multiple>
                            </label>
                            <p class="pl-1">or drag and drop</p>
                          </div>
                          <p class="text-xs text-gray-500">
                            PNG or JPG up to 10MB
                          </p>
                        </div>
                    </div>
                </div>

              </div>

              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Save
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
