<x-AdminApp-layout>
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl bold">
                تغییر دسته ی رستوران
            </h1>
        </div>

        <div class="flex justify-center pt-20">
            <form action="/admin/banner/{{$banner->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="block text-center">
                    <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-grey-400 text-right" name="title" value="{{$banner->title}}">

                    <label class="text-2xl bold text-center">عکس این دسته بندی</label>
                    <input type="file" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-pink-400" name="image">

                    <button type="submit" class="bg-pink-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold text-white">
                        ثبت
                    </button>

                </div>
            </form>
        </div>
        @if ($errors->any())
        <div class="w-4/8 m-auto text-center">
            @foreach($errors->all() as $error)
            <li class="text-red-500 list-none">
                {{$error}}
            </li>
            @endforeach
        </div>
        @endif
    </div>
</x-AdminApp-layout>