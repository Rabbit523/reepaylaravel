<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\ApartmentType;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Sloveniangooner\SearchableSelect\SearchableSelect;
use Laravel\Nova\Panel;
use App\Cities;

class Apartment extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Apartment';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            new Panel('Advertise Configuration', $this->defaultInformation()),
            new Panel('Apartment Information', $this->apartmentInformation()),
        ];
    }

    /**
     * @return array
     */
    public function defaultInformation()
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required'),

            Textarea::make('Description', 'description')
                ->hideFromIndex()
                ->rules('required'),

            Images::make('Main image', 'main')
                ->conversionOnIndexView('thumb')
                ->rules('required')
                ->withResponsiveImages()
                ->setFileName(function($originalFilename, $extension, $model){
                    return md5($originalFilename) . '.' . $extension;
                }),

            Images::make('Pictures', 'pictures') // second parameter is the media collection name
            ->conversionOnPreview('medium-size') // conversion used to display the "original" image
            ->conversionOnDetailView('thumb')
                ->hideFromIndex()
                ->conversionOnForm('thumb')
                ->fullSize()
                ->withResponsiveImages()
                ->singleImageRules('dimensions:min_width=100')
                ->setFileName(function($originalFilename, $extension, $model){
                    return md5($originalFilename) . '.' . $extension;
                }),

            SearchableSelect::make('Created By', 'created_by')
                ->resource('users')
                ->withMeta([
                    'value' => $this->created_by ?? auth()->user()->id
                ])
                ->value('id')
                ->label('email')
                ->displayUsingLabels(),
        ];
    }

    /**
     * @return array
     */
    public function apartmentInformation()
    {
        $apartmentsTypes = ApartmentType::all();
        $apartmentsTypesArray = [];

        foreach($apartmentsTypes as $apartmentsType) {
            $apartmentsTypesArray[$apartmentsType['id']] = $apartmentsType['name'];
        }

        $cities = Cities::all();
        $citiesArray = [];

        foreach($cities as $city) {
            $citiesArray[$city['id']] = $city['name'];
        }

        return [
            Select::make('Type')
                ->sortable()
                ->rules('required')
                ->displayUsingLabels()
                ->options(
                    $apartmentsTypesArray
                ),

            Text::make('Address')
                ->sortable()
                ->rules('required', 'max:255'),

            Select::make('City')
                ->sortable()
                ->rules('required')
                ->displayUsingLabels()
                ->options(
                    $citiesArray
                ),

            Number::make('Rent')
                ->sortable()
                ->rules('required'),

            Number::make('Deposit')
                ->sortable()
                ->rules('required'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
