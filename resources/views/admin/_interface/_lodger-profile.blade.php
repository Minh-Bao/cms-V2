          <div class="box">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ "https://www.gravatar.com/avatar/".   md5(strtolower(trim($lodger->email))) . "?s=100&d=mm" }}" alt="{{ $lodger->firstname }} {{ $lodger->name }}">
              <h3 class="profile-username text-center">{{ $lodger->firstname }} {{ $lodger->name }}</h3>
              <p class="text-gray-700 text-center">Locataire</p>
              <ul class="flex flex-col pl-0 mb-0 border rounded border-gray-300 list-group-unbordered">
                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">
                  <p><b>Ligne fixe</b> <span class="pull-right">{{ $lodger->phone }}</span></p>
                </li>
                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">
                  <p><b>Téléphone portable</b> <span class="pull-right">{{ $lodger->mobile }}</span></p>
                </li>
                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">
                  <p><b>Email</b> <span class="pull-right">{{ $lodger->email }}</span></p>
                </li>
                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">
                  <p><b>Adresse</b> <span class="pull-right">
                  {{ $lodger->address1 }} {{ $lodger->address2 }} <br />
                  {{ $lodger->zip_code }}  {{ $lodger->city }} {{ $lodger->country }}
                  </span></p>
                </li>
              </ul>
              <h4 class="box-title"><i class="fa fa-envelope"></i> Envoyer un email au locataire</h4>
                {!! Form::open(['route' => 'emails.store' ]) !!}
                <input type="hidden" name="users_id" value="{{ $lodger->id }}">
                <?php if (!isset($alert->id)) { } else {?>
                <input type="hidden" name="alerts_id" value="{{ $alert->id }}">
                <?php } ?>
                {{ Form::textarea('message', null, array('class'=>'textarea', 'placeholder'=>'Message', 'style'=>'width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin-bottom:10px;'))}}
                {{ Form::submit('Envoyer', array('class'=>'pull-right btn btn-default' , 'id'=>'sendEmail')) }}
              {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->