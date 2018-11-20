<div class="hero-bg">
    <div class="hero-content bg-tertiary" style="background-image: url('{{$background}}');">
        <div class="row">
            <div class="column small-12 align-self-middle">
                <div class="card card-outline text-center">
                    <div>
                        <img data-interchange="[/images/shotsfiredlogo-small.png, small]" alt="">
                    </div>
                </div>
                @if(isset($embed))
                   <!--VideoApps code BEGIN--><div id="dplayer_flash_415c44g50hdiicg" style="width:720px;height:800px;position:relative;"></div><SCRIPT LANGUAGE=JavaScript TYPE="text/javascript" SRC="//play.streamingvideoprovider.com/js/vapp.js" ></SCRIPT><SCRIPT LANGUAGE=JavaScript>var vapp = new VappController({use_div: "dplayer_flash_415c44g50hdiicg", player_width: "720", player_height: "800"}, {clip_id: "2013502", player_id: "4GE35AGFE12D4C4", playlist_id: "151487", transparent: "1", uk: "fb196ba829fdc14511a48818041500d4", live_id: "", sel_playlist: "415c44g50hdiicg", sel_multiplaylist: "", use_html5: "true", layout: "default", theme: "light", is_responsive: "1", is_inversed: "", is_vertical: "", one_thumb_per_row: "", disable_hash: "", widget_height_behavior: "0", hide_playlist: "", hide_live_chat: "1", hide_description: "", playlist_position: "", chat_position: "", description_position: ""});</SCRIPT><!--VideoApps code END-->
                @endif
                <!-- <div class="card-section text-center heroInfo">
                    <div class="row align-center">
                        <div class="small-11 large-8 column">
                            <div class="h3 text-white text-center">{!! $name !!}</div>
                        </div>
                    </div>
                    <h4 class="headline text-white">{!! $date !!}</h4>
                    <p class="text-white">
                        {{$venue}}
                    </p>
                    <p class="text-white">
                        {{$content}}
                    </p>
                </div> -->
            </div>
        </div>
    </div>
</div>
