<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Sloveniangooner\SearchableSelect\SearchableSelect;
use Laravel\Nova\Fields\BelongsTo;

class Subscription extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Subscription';

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
        $plan = \App\Plan::where('is_default', true)->first();

        return [
            ID::make()->sortable(),

            SearchableSelect::make('User', 'user_id')
                ->resource('users')
                ->value('id')
                ->label('email')
                ->displayUsingLabels(),

            SearchableSelect::make('Plan', 'plan_id')
                ->resource('plans')
                ->value('id')
                ->label('plan_id')
                ->withMeta([
                    'value' => $plan->id ?? null
                ])
                ->displayUsingLabels(),

            Text::make('Subscription Id')
                ->sortable()
                ->rules('required'),

            DateTime::make('Subscription Create')
                ->sortable(),

            DateTime::make('Trial End')
                ->sortable(),

            DateTime::make('Next Invoice')
                ->sortable(),
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
