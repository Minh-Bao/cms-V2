         <!-- Profile Image -->

          <div class="box @if($admin->isOnline()) box-primary @else box-danger @endif">

            <div class="box-body box-profile">

              <img class="profile-user-img img-responsive img-circle" src="{{ "https://www.gravatar.com/avatar/".   md5(strtolower(trim($admin->email))) . "?s=100&d=mm" }}" alt="{{ $admin->firstname }} {{ $admin->name }}">



              <h3 class="profile-username text-center">{{ $admin->firstname }} {{ $admin->name }}</h3>



              <p class="text-gray-700 text-center">{{ $admin->job_title }}</p>



              <ul class="flex flex-col pl-0 mb-0 border rounded border-gray-300 list-group-unbordered">

                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">

                  <p><b>Ligne fixe</b> <span class="pull-right">{{ $admin->phone }}</span></p>

                </li>

                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">

                  <p><b>Téléphone portable</b> <span class="pull-right">{{ $admin->mobile }}</span></p>

                </li>

                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">

                  <p><b>Email</b> <span class="pull-right">{{ $admin->email }}</span></p>

                </li>

              </ul>

                        @if (auth()->user()->level==1 || ( auth()->user()->level==2 && auth()->user()->store_id==$admin->store_id ) )

          <a href="{{ route('team.edit',$admin->id) }}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600 w-full"><i class="fa fa-pencil" aria-hidden="true"></i> Modifier</a>

          @endif





              <h4 class="box-title"><i class="fa fa-envelope"></i> Envoyer un email</h4>

              <form>

                {{ Form::textarea('message', null, array('class'=>'textarea', 'placeholder'=>'Message', 'style'=>'width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; margin-bottom:10px;'))}}

                <button type="button" class="pull-right inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default" id="sendEmail">Envoyer

                <i class="fa fa-arrow-circle-right"></i></button>

              {!! Form::close() !!}



            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->





