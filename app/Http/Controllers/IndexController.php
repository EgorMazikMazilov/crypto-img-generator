<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (view()->exists('site.index')) {

            $data = [
                'title' => 'Быстрый гениратор картинок CryptoHacks',
                'description' => 'Использовать с умом',

            ];

            return view('site.index', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function myFormMet(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');

            if ($input['currency'] == 1) {
                // create Image from file
                $img = Image::make(asset('assets/images/CryptoHaksSignalUSD.jpg'));
                $pair = strtoupper($request['pair']) . ' / USD';
                $pair = trim(htmlspecialchars($pair));
            } elseif ($input['currency'] == 2) {
                $img = Image::make(asset('assets/images/CryptoHaksSignalBTC.jpg'));
                $pair = strtoupper($request['pair'] . ' / BTC');
                $pair = trim(htmlspecialchars($pair));
            }
            if (!isset($input['take2'])) {
                $input['take2'] = null;
            }

            // write text
            $market1 = isset($input['bitfinex']) ? strtoupper('bitfinex') : null;
            $market2 = isset($input['bittrex']) ? ' / ' . strtoupper('bittrex') : null;
            $market3 = isset($input['binance']) ? ' / ' . strtoupper('binance') : null;
            $market4 = isset($input['poloniex']) ? ' / ' . strtoupper('poloniex') : null;

            $marketText = $market1 . $market2 . $market3 . $market4;

            //dd($marketText);

            $img->text($marketText, 300, 180, function ($font) {
                $font->file(public_path('assets/fonts/enigmatic_unicode_regular.ttf'));
                $font->size(28);
                $font->color('#ffffff');
                $font->align('center');
                $font->valign('top');
            });

            // PAIR
            //black
            $img->text($pair, 300, 233, function ($font) {
                $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                $font->size(48);
                $font->color('#000000');
                $font->align('center');
                $font->valign('top');
            });
            //white
            $img->text($pair, 300, 230, function ($font) {
                $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                $font->size(48);
                $font->color('#ffffff');
                $font->align('center');
                $font->valign('top');
            });
            //dd($input);

            /**
             * *
             * If form with Short
             * *
             * */
            if (isset($input['short']) && $input['short'] == 1 ) {
                //SHORT WORD
                $img->text('SHORT', 300, 293, function ($font) {
                    $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                    $font->size(48);
                    $font->color('#000000');
                    $font->align('center');
                    $font->valign('top');
                });
                $img->text('SHORT', 300, 290, function ($font) {
                    $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                    $font->size(48);
                    $font->color('#ffffff');
                    $font->align('center');
                    $font->valign('top');
                });
                //END SHORT WORD

                //Start SALE WORD
                $buy = 'SALE: ' . trim($input['buy']);
                $img->text($buy, 300, 353, function ($font) {
                    $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                    $font->size(48);
                    $font->color('#000000');
                    $font->align('center');
                    $font->valign('top');
                });

                $buy = 'SALE: ' . trim($input['buy']);
                $img->text($buy, 300, 350, function ($font) {
                    $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                    $font->size(48);
                    $font->color('#ffffff');
                    $font->align('center');
                    $font->valign('top');
                });
                //END SALE WORD

                //START STOP WORD
                $stop = 'STOP: ' . trim($input['stop']);
                $img->text($stop, 300, 413, function ($font) {
                    $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                    $font->size(48);
                    $font->color('#000000');
                    $font->align('center');
                    $font->valign('top');
                });
                $stop = 'STOP: ' . trim($input['stop']);
                $img->text($stop, 300, 410, function ($font) {
                    $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                    $font->size(48);
                    $font->color('#ffffff');
                    $font->align('center');
                    $font->valign('top');
                });
                //END STOP WORD

                //START TAKE WORD

                if (!isset($input['take2']) || empty($input['take2'])) {
                    $take = 'TAKE: ' . trim($input['take1']);
                    $img->text($take, 300, 473, function ($font) {
                        $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                        $font->size(48);
                        $font->color('#000000');
                        $font->align('center');
                        $font->valign('top');
                    });
                    $take = 'TAKE: ' . trim($input['take1']);
                    $img->text($take, 300, 470, function ($font) {
                        $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                        $font->size(48);
                        $font->color('#ffffff');
                        $font->align('center');
                        $font->valign('top');

                    });


                }
                elseif($input['take2'] != null) {
                    $take = 'TAKE 1: ' . trim($input['take1']);
                    $img->text($take, 300, 473, function ($font) {
                        $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                        $font->size(48);
                        $font->color('#000000');
                        $font->align('center');
                        $font->valign('top');
                    });
                    $take = 'TAKE 1: ' . trim($input['take1']);
                    $img->text($take, 300, 470, function ($font) {
                        $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                        $font->size(48);
                        $font->color('#ffffff');
                        $font->align('center');
                        $font->valign('top');

                    });
                    $take = 'TAKE 2: ' . trim($input['take2']);
                    $img->text($take, 300, 533, function ($font) {
                        $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                        $font->size(48);
                        $font->color('#000000');
                        $font->align('center');
                        $font->valign('top');
                    });
                    $take = 'TAKE 2: ' . trim($input['take2']);
                    $img->text($take, 300, 530, function ($font) {
                        $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                        $font->size(48);
                        $font->color('#ffffff');
                        $font->align('center');
                        $font->valign('top');

                    });
                }
                //END TAKE WORD

                //START RISK & DEPO WORD
                $risk = trim($input['risk']);
                $depo = 'DEPO: ' . trim($input['depo']) . '%';

                switch ($risk) {
                    case "L":
                        $img->text("RISK: LOW     " . $depo, 300, 593, function ($font) {
                            $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                            $font->size(36);
                            $font->color('#000000');
                            $font->align('center');
                            $font->valign('top');
                        });
                        $img->text("RISK: LOW     " . $depo, 300, 590, function ($font) {
                            $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                            $font->size(36);
                            $font->color('#ffffff');
                            $font->align('center');
                            $font->valign('top');
                        });
                        break;
                    case "M":
                        $img->text("RISK: MEDIUM     " . $depo, 300, 593, function ($font) {
                            $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                            $font->size(36);
                            $font->color('#000000');
                            $font->align('center');
                            $font->valign('top');
                        });
                        $img->text("RISK: MEDIUM     " . $depo, 300, 590, function ($font) {
                            $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                            $font->size(36);
                            $font->color('#ffffff');
                            $font->align('center');
                            $font->valign('top');
                        });
                        break;
                    case "H":
                        $img->text("RISK: HIGH     " . $depo, 300, 593, function ($font) {
                            $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                            $font->size(36);
                            $font->color('#000000');
                            $font->align('center');
                            $font->valign('top');
                        });
                        $img->text("RISK: HIGH     " . $depo, 300, 590, function ($font) {
                            $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                            $font->size(36);
                            $font->color('#ffffff');
                            $font->align('center');
                            $font->valign('top');
                        });
                        break;
                }
                //END RISK & DEPO WORD
            }
            /**
             * *
             * END form with  Short
             * *
             * */

            /***************===================********************/

            /**
             * *
             * START form without Short
             * *
             * */
                if(!isset($input['short'])){

                    //Start BUY WORD
                    $buy = 'BUY: ' . trim($input['buy']);
                    $img->text($buy, 300, 353, function ($font) {
                        $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                        $font->size(48);
                        $font->color('#000000');
                        $font->align('center');
                        $font->valign('top');
                    });

                    $buy = 'BUY: ' . trim($input['buy']);
                    $img->text($buy, 300, 350, function ($font) {
                        $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                        $font->size(48);
                        $font->color('#ffffff');
                        $font->align('center');
                        $font->valign('top');
                    });
                    //END BUY WORD

                    //START STOP WORD
                    $stop = 'STOP: ' . trim($input['stop']);
                    $img->text($stop, 300, 413, function ($font) {
                        $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                        $font->size(48);
                        $font->color('#000000');
                        $font->align('center');
                        $font->valign('top');
                    });
                    $stop = 'STOP: ' . trim($input['stop']);
                    $img->text($stop, 300, 410, function ($font) {
                        $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                        $font->size(48);
                        $font->color('#ffffff');
                        $font->align('center');
                        $font->valign('top');
                    });
                    //END STOP WORD

                    //START TAKE WORD
                    if (!isset($input['take2']) || empty($input['take2'])) {
                        $take = 'TAKE: ' . trim($input['take1']);
                        $img->text($take, 300, 473, function ($font) {
                            $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                            $font->size(48);
                            $font->color('#000000');
                            $font->align('center');
                            $font->valign('top');
                        });
                        $take = 'TAKE: ' . trim($input['take1']);
                        $img->text($take, 300, 470, function ($font) {
                            $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                            $font->size(48);
                            $font->color('#ffffff');
                            $font->align('center');
                            $font->valign('top');

                        });


                    }
                    elseif($input['take2'] != null) {
                        $take = 'TAKE 1: ' . trim($input['take1']);
                        $img->text($take, 300, 473, function ($font) {
                            $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                            $font->size(48);
                            $font->color('#000000');
                            $font->align('center');
                            $font->valign('top');
                        });
                        $take = 'TAKE 1: ' . trim($input['take1']);
                        $img->text($take, 300, 470, function ($font) {
                            $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                            $font->size(48);
                            $font->color('#ffffff');
                            $font->align('center');
                            $font->valign('top');

                        });
                        $take = 'TAKE 2: ' . trim($input['take2']);
                        $img->text($take, 300, 533, function ($font) {
                            $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                            $font->size(48);
                            $font->color('#000000');
                            $font->align('center');
                            $font->valign('top');
                        });
                        $take = 'TAKE 2: ' . trim($input['take2']);
                        $img->text($take, 300, 530, function ($font) {
                            $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                            $font->size(48);
                            $font->color('#ffffff');
                            $font->align('center');
                            $font->valign('top');

                        });
                    }
                    //END TAKE WORD

                    //START RISK & DEPO WORD
                    $risk = trim($input['risk']);
                    $depo = 'DEPO: ' . trim($input['depo']) . '%';

                    switch ($risk) {
                        case "L":
                            $img->text("RISK: LOW     " . $depo, 300, 593, function ($font) {
                                $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                                $font->size(36);
                                $font->color('#000000');
                                $font->align('center');
                                $font->valign('top');
                            });
                            $img->text("RISK: LOW     " . $depo, 300, 590, function ($font) {
                                $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                                $font->size(36);
                                $font->color('#ffffff');
                                $font->align('center');
                                $font->valign('top');
                            });
                            break;
                        case "M":
                            $img->text("RISK: MEDIUM     " . $depo, 300, 593, function ($font) {
                                $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                                $font->size(36);
                                $font->color('#000000');
                                $font->align('center');
                                $font->valign('top');
                            });
                            $img->text("RISK: MEDIUM     " . $depo, 300, 590, function ($font) {
                                $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                                $font->size(36);
                                $font->color('#ffffff');
                                $font->align('center');
                                $font->valign('top');
                            });
                            break;
                        case "H":
                            $img->text("RISK: HIGH     " . $depo, 300, 593, function ($font) {
                                $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                                $font->size(36);
                                $font->color('#000000');
                                $font->align('center');
                                $font->valign('top');
                            });
                            $img->text("RISK: HIGH     " . $depo, 300, 590, function ($font) {
                                $font->file(public_path('assets/fonts/EnigmaB_2.ttf'));
                                $font->size(36);
                                $font->color('#ffffff');
                                $font->align('center');
                                $font->valign('top');
                            });
                            break;
                    }

                }
            /**
             * *
             * END form without  Short
             * *
             * */

            $img->save(public_path('assets/images/signal.jpg'));
            \Session::put('status', 'Ok');
            return redirect('/');
        }
    }
}
