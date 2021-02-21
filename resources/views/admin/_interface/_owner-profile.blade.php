          <div class="box">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ "https://www.gravatar.com/avatar/".   md5(strtolower(trim($owner->email))) . "?s=100&d=mm" }}" alt="{{ $owner->firstname }} {{ $owner->name }}">
              <h3 class="profile-username text-center">{{ $owner->firstname }} {{ $owner->name }}</h3>
              <p class="text-muted text-center">Propriétaire</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <p><b>Ligne fixe</b> <span class="pull-right">{{ $owner->phone }}</span></p>
                </li>
                <li class="list-group-item">
                  <p><b>Téléphone portable</b> <span class="pull-right">{{ $owner->mobile }}</span></p>
                </li>
                <li class="list-group-item">
                  <p><b>Email</b> <span class="pull-right">{{ $owner->email }}</span></p>
                </li>
                <li class="list-group-item">
                  <p><b>Adresse</b> <span class="pull-right">
                  {{ $owner->address1 }} {{ $owner->address2 }} <br />
                  {{ $owner->zip_code }}  {{ $owner->city }} {{ $owner->country }}
                  </span></p>
                </li>
              </ul>
              <h4 class="box-title"><i class="fa fa-envelope"></i> Envoyer un email au propriétaire</h4>
                {!! Form::open(['route' => 'emails.store' ]) !!}
                <input type="hidden" name="users_id" value="{{ $owner->id }}">
                <input type="hidden" name="to" value="{{ $owner->email }}">
                <input type="hidden" name="admin" value="{{ Auth::user()->firstname }} {{ Auth::user()->name }}">
                <input type="hidden" name="from" value="{{ Auth::user()->email }}">
                <?php if (!isset($alert->id)) { } else {?>
                <input type="hidden" name="alerts_id" value="{{ $alert->id }}">
                <?php } ?>
                {{ Form::textarea('message', null, array('class'=>'textarea', 'placeholder'=>'Message', 'style'=>'width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin-bottom:10px;'))}}

                {{ Form::submit('Envoyer', array('class'=>'pull-right btn btn-default' , 'style' => 'width:100px;', 'id'=>'sendEmailOwner')) }}
                <button class="btn btn-success pull-right" style="display:none;width:100px;" id="sendedEmailOwner" disabled><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></button>

                
              {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <script type="text/javascript">
            $( "#sendEmailOwner" ).click(function() {
              $(this).hide();
              $('#sendedEmailOwner').show();
            });
          </script>