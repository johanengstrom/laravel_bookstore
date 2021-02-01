<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('status') == 'success_delete')
                        <div class="p-6 bg-green-50">
                        {{ __('Book successfully deleted') }}
                        </div>
                    @endif
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium 
                                text-gray-500 uppercase tracking-wider">
                                Id
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium 
                                text-gray-500 uppercase tracking-wider">
                                Title
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium 
                                text-gray-500 uppercase tracking-wider">
                                Author
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium 
                                text-gray-500 uppercase tracking-wider">
                                Price
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium 
                                text-gray-500 uppercase tracking-wider">
                                Stock
                                </th>
                                <th colspan="3">
                                </td>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($books as $book)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                            {{$book['id']}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            {{$book['title']}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            @if ($book->author()->get()->first())
                            {{ $book->author()->get()->first()->firstname }}
                            {{ $book->author()->get()->first()->surname }}
                            @endif
                            <!-- {{$book['author']}} -->
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            {{$book['price']}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            {{$book['stock']}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ 
                                    action(
                                        [App\Http\Controllers\BookController::class,'edit'], 
                                        ['book'=>$book]) 
                                        }}" class="uppercase px-8 py-2 bg-yellow-500
                                        text-blue-50 max-w-max shadow-sm hover:shadow-lg">
                                        Edit</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{
                                           action(
                                               [App\Http\Controllers\BookController::class,
                                               'destroy'], ['book'=>$book]
                                           ) 
                                        }}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE" />
                                        <button class="uppercase px-8 py-2 bg-red-500 text-blue-50
                                        max-w-max shadow-sm hover:shadow-lg" type="submit">Delete
                                        </button>
                                        </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>