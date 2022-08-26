@extends('page.homepage')
@section('content')
<!-- $user_id = Auth::user()->id;

        $input = new Listing;

        $input->user_id = $user_id;
        $input->name = Input::get('name');
        $input->category = Input::get('category');
        $input->keyword = Input::get('keyword');
        $input->location = Input::get('location');
        $input->address = Input::get('address');
        $input->zipcode = Input::get('zipcode');
        $input->image = Input::get('image');
        $input->detail = Input::get('detail');
        $input->price = Input::get('price');
        $input->phone = Input::get('phone');
        $input->mobile = Input::get('mobile');


        if ($file = $request->file('image')){

            $name = $file->getClientOriginalName();

            $file->move('images/listings', $name);

            $input['image'] = $name;

        }

        elseif ($file1 = $request->file('image1')){

            $name1 = $file1->getClientOriginalName();

            $file1->move('images/listings', $name1);

            $input1['image1'] = $name1;

        }

        elseif ($file2 = $request->file('image2')){

            $name2 = $file2->getClientOriginalName();

            $file2->move('images/listings', $name2);

            $input2['image2'] = $name2;

        }

        $input->save();

        return redirect()->back();
 -->
@endsection