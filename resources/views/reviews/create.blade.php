@extends ('layouts.app')

@section('content')
    <form action="{{ $repair->path(). '/review'}}" method="POST" class="lg:w-3/5 lg:mx-auto bg-white p-6 md:py-12 mt-6 md:px-16 rounded shadow">
        @csrf

        <h1 class="text-4xl font-normal mb-10 text-center">
            How was everything?
        </h1>

        <div class="field mb-6">
            <label class="label text-sm mb-4 block" for="description" style="font-size: 1.2rem">Description</label>

            <div class="control">
                <textarea
                    name="description"
                    rows="15"
                    class="textarea bg-transparent border border-blue-light rounded p-2 text-m w-full"
                    placeholder="The fixer was very responsive and gave me a great price"></textarea>
            </div>
        </div>

            <!-- Rating -->
 
        <div class="container">
            <div class="w-full">
                <div class="rate">
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
            </div>
      </div>


        <div class="field">
            <div class="control">
                <br><br><br><button type="submit" class="button is-link mr-2 ml-4 mt-6">Create Project</button>

                <a href="/projects">Cancel</a>
            </div>
        </div>
    </form>
@endsection