@extends('PDF.Header')
@section('content')
    <div class="sub-container2 page-break">
        <h1 class="text-green mb-3">Breakdown DiSC Quadrant</h1>
        <p class="mb-3">The DiSC' quadrants in the box below show the percentage of people who received high scores in the
            D, i, S, or C
            styles.</p>

        <table style="border: 1px solid black;">
            <tbody>
                <tr>
                    <td class="table-con text-red text-style">D <br> <b class="percent-b">{{ $perD }}% High</b> </td>
                    <td class="table-con text-yellow text-style">i <br> <b class="percent-b">{{ $perI }}% High</b>
                    </td>
                </tr>
                <tr>
                    <td class="table-con text-grass text-style">S <br> <b class="percent-b">{{ $perS }}% High</b>
                    </td>
                    <td class="table-con text-blue text-style">C <br> <b class="percent-b">{{ $perC }}% High</b>
                    </td>
                </tr>

            </tbody>
        </table>


    </div>


    <div class="sub-container2 page-break">

        <h1 class="text-green text-center mb-3">DiSC Behaviour Style by Department</h1>


        <img class="img-chart" src="{{ $url1 }}" alt="image">
        <img class="img-chart2" src="{{ $url2 }}" alt="image">

        {{-- <h1 class="hide">.</h1> --}}

        <img class="img-chart" src="{{ $url3 }}" alt="image">
        <img class="img-chart2" src="{{ $url1 }}" alt="image">
        <img class="img-chart" src="{{ $url2 }}" alt="image">
        {{-- <h1 class="hide">.</h1> --}}
        <img class="img-chart2" src="{{ $url3 }}" alt="image">
    </div>
    <div class="sub-container2 page-break">

        <h1 class="text-green text-center mb-3">DiSC Behaviour Style by Department</h1>
        @php
            $inti = 0;
        @endphp
        @foreach ($url as $url)
            @php
                $inti++;
            @endphp
            @if ($inti % 2 == 0)
                <img class="img-chart2" src="{{ $url }}" alt="image">
            @else
                <img class="img-chart" src="{{ $url }}" alt="image">
            @endif
        @endforeach



    </div>



    <div class="sub-container2 page-break">
        <h1 class="text-green text-center">DISC and group culture by Department</h1>
        <h2 class="text-lightgreen text-sub">'D' Culture</h2>
        <p>The percentage of your group members (30%) who have high Dominance style scores. A D culture is distinguished by
            quick decisions, direct responses, and a competitive atmosphere. This culture places a premium on solid results
            and rapid growth. Those who are direct and straightforward earn trust. People who thrive in this environment are
            typically hardworking individuals who enjoy challenges and the thrill of victory. This type of environment is
            ideal for those who want to advance up the corporate ladder and achieve success. In this culture, however,
            interpersonal communication may suffer, and those who are less assertive may feel overwhelmed. Furthermore, such
            a culture may face high turnover and a stressful environment.</p>

        <div class="float-left">
            <h4>Rewards</h4>
            <ul>
                <li>Independence</li>
                <li>Decisiviness</li>
                <li>Directness</li>
                <li>Victory</li>
                <li>Results</li>
            </ul>
        </div>
        <div class="clear-left">
            <h4>Criticizes</h4>
            <ul>
                <li>Hesitation</li>
                <li>Overanalyzes</li>
                <li>Foot-dragging</li>
                <li>Over-sensitivity</li>
                <li>Weakness</li>
            </ul>
        </div>





    </div>
    <div class="sub-container2 page-break">
        <h1 class="text-green">The 'D' style within your department</h1>
        <h3>Departments A</h3>
        <div class="float-left">
            <h4>HighD:</h4>
            <ul>
                <li>Independence</li>
                <li>Decisiviness</li>
                <li>Directness</li>
                <li>Victory</li>
                <li>Results</li>
            </ul>
        </div>
        <div class="clear-left">
            <h4>LoW D:</h4>
            <ul>
                <li>Hesitation</li>
                <li>Overanalyzes</li>
                <li>Foot-dragging</li>
                <li>Over-sensitivity</li>
                <li>Weakness</li>
            </ul>
        </div>
        <br>
        <h3>Departments B</h3>
        <div class="float-left">
            <h4>HighD:</h4>
            <ul>
                <li>Independence</li>
                <li>Decisiviness</li>
                <li>Directness</li>
                <li>Victory</li>
                <li>Results</li>
            </ul>
        </div>
        <div class="clear-left">
            <h4>LoW D:</h4>
            <ul>
                <li>Hesitation</li>
                <li>Overanalyzes</li>
                <li>Foot-dragging</li>
                <li>Over-sensitivity</li>
                <li>Weakness</li>
            </ul>
        </div>
    </div>

    <div class="sub-container2 page-break">
        <h1 class="text-green">The 'D' style within your department fetch</h1>
        <h4 class=" mb-3" style="color: red;">*This list is group by department</h4>
        {{-- high d --}}
        <div>
            @php
                $i = 0;
                $cound = count($djoin);
                $counl = count($djoinlow);
            @endphp
            <h3>High D style</h3>
            @if ($cound > 0)
                <table style="width: 100%;" class="text-center">

                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Name</th>
                        {{-- <th>Low behavior</th> --}}
                        <th style="width: 20%;">Department</th>
                    </tr>


                    @foreach ($djoin as $djoin)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $djoin->name }}</td>
                            {{-- <td>{{ $djoin->High }}</td> --}}

                            <td>{{ $djoin->department }}</td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>no records</h3>
            @endif
        </div>
        {{-- low d --}}
        <div>
            <h3>Low D style</h3>
            @if ($counl > 0)
                <table style="width: 100%;" class="text-center">

                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Name</th>
                        {{-- <th>Low behavior</th> --}}
                        <th style="width: 20%;">Department</th>
                    </tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($djoinlow as $djoinl)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $djoinl->name }}</td>
                            {{-- <td>{{ $djoinl->Low }}</td> --}}

                            <td>{{ $djoinl->department }}</td>
                        </tr>
                    @endforeach

                </table>
            @else
                <h3>no records</h3>
            @endif


        </div>



    </div>

    <div class=" sub-container2 page-break">
        <h1 class="text-green">Working with "D" Culture</h1>
        <p>The D culture offers benefits and challenges for people with each of the four DiSC' styles.</p>

        <h3 class="underline">High - D Individuals</h3>
        <p>High-D people enjoy the fast pace of this culture. They see the environment as ideal for achieving their
            objectives and progressing in their careers. Their desire to win every encounter is motivated not only by what
            they believe is best for themselves, but also by what they believe is best for the organisation. In this way,
            their perseverance earns them the respect of their coworkers, who may look to them for leadership. Their
            assertiveness, on the other hand, makes them ripe for conflict with peers, particularly those who share their
            high-D tendencies.</p>

        <h3 class="underline">High - i Individuals</h3>
        <p>People with a high I value the speed with which their ideas are implemented as well as the enthusiasm that the
            environment fosters. Furthermore, their positive attitude toward projects is a huge asset to the organisation.
            However, the organisation may not be as enthusiastic about recognising their outstanding work as the high-i
            would like.</p>

        <h3 class="underline">High - C Individuals</h3>
        <p>
            These people appreciate the fact that business is at the forefront of this culture. They appreciate that goals
            are prioritised and that no time is wasted on small talk. People with a high C are a great asset to
            organisations with this culture because they are dedicated to resolving details and analysing the consequences.
            However, high-C individuals may struggle with the hectic pace and immediate results that this environment
            requires.</p>

        <h3 class="underline">High - S Individuals</h3>
        <p>
            In this culture's hard-charging negotiations and constant striving, High-S people frequently find a niche as a
            sympathetic ear. These individuals contribute to the organisation by using their people skills whenever
            possible. They may, however, frequently feel hurt and stressed in a setting that they perceive to be cold and
            harsh. Furthermore, they may believe that their ideas are being suffocated by those they perceive to be more
            aggressive and pushy. Finally, this culture's frequent sense of urgency may disrupt their preference for a
            systematic and predictable approach to problem solving.</p>

    </div>

    <div class="sub-container2 page-break">
        <h1 class="text-green">DISC and group culture by Department</h1>
        <h2 class="text-lightgreen text-sub">'I' Culture</h2>
        <p>The percentage of your group members (20%) who have high scores on the influencing style. An I culture is
            distinguished by an energetic atmosphere, a focus on innovation, and a lot of time spent in meetings or social
            gatherings. This culture values effective teamwork and problem-solving creativity. Those who are open and
            expressive are trusted. People who excel in this environment are charismatic and have excellent social skills.
            Such an environment is ideal for those who value the power of group brainstorming and the potential of new
            ideas. Individuals who are not as people-oriented, on the other hand, may be frustrated by the emphasis on group
            activities and social niceties. Furthermore, poor planning and haphazard attention to detail can sometimes
            prevent high-i groups from putting bold ideas into action.</p>
        <div class="float-left">
            <h4>Rewards</h4>
            <ul>
                <li>Creativity</li>
                <li>Enthusiasm</li>
                <li>Optimsim</li>
                <li>Collaboration</li>
                <li>Passion</li>
            </ul>
        </div>
        <div class="clear-left">
            <h4>Criticizes</h4>
            <ul>
                <li>Rulemaking</li>
                <li>Caution</li>
                <li>Overanalyzes</li>
                <li>Introvesion</li>
                <li>Insesitivity</li>
            </ul>
        </div>
    </div>
    <div class="sub-container2 page-break">
        <h1 class="text-green">The 'i' style within your department</h1>
        <h4 class=" mb-3" style="color: red;">*This list is group by department</h4>
        {{-- high i --}}
        <div>
            <h3>High i style</h3>
            @php
                $i = 0;
                $cound = count($ijoin);
                $counl = count($ijoinlow);
            @endphp
            @if ($cound > 0)
                <table style="width: 100%;" class="text-center">

                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Name</th>
                        {{-- <th>Low behavior</th> --}}
                        <th style="width: 20%;">Department</th>
                    </tr>

                    @foreach ($ijoin as $ijoin)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $ijoin->name }}</td>
                            {{-- <td>{{ $djoin->High }}</td> --}}

                            <td>{{ $ijoin->department }}</td>
                        </tr>
                    @endforeach

                </table>
            @else
                <h3>No records</h3>
            @endif

        </div>
        {{-- low i --}}
        <div>
            <h3>Low i style</h3>
            @if ($counl > 0)
                <table style="width: 100%;" class="text-center">

                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Name</th>
                        {{-- <th>Low behavior</th> --}}
                        <th style="width: 20%;">Department</th>
                    </tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($ijoinlow as $ijoinl)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $ijoinl->name }}</td>
                            {{-- <td>{{ $djoinl->Low }}</td> --}}

                            <td>{{ $ijoinl->department }}</td>
                        </tr>
                    @endforeach

                </table>
            @else
                <h3>No records</h3>
            @endif

        </div>
    </div>
    <div class="sub-container2 page-break">
        <h1 class="text-green">Working in the "i" Culture</h1>
        <p>The i culture offers benefits and challenges for people with each of the four DiSC' styles.</p>

        <h3 class="underline">High - D Individuals</h3>
        <p>
            High-D people enjoy the fast pace and exciting developments that this culture promotes. Their eagerness to take
            on new challenges keeps the creative cycle going, which inspires their coworkers and benefits the organisation.
            They may become impatient with long meetings, and the culture's emphasis on people's feelings may appear
            inappropriate or even counterproductive to them.</p>

        <h3 class="underline">High - I Individuals</h3>
        <p>
            This culture is the best fit for someone with a high IQ. These people thrive on novel approaches and constant
            interaction with peers, both of which are abundant in this setting. The priorities of this culture suit these
            energetic people so well that their natural zeal propels the organization forward. However, flaws such as lack
            of organization and haphazard planning can be exacerbated when a high-i person is present in this setting.</p>

        <h3 class="underline">High - S Individuals</h3>
        <p>
            People with a high S quotient respond well to the recognition they receive in this culture. And, while they may
            not be the most vocal in group settings, they appreciate the fact that social graces are valued in this
            environment. These individuals concentrate on consistent performance and avoid drawing attention to themselves,
            allowing the organization to operate more efficiently. Nonetheless, the rate of change in this culture may be
            too fast for them at times, and their need for direction is likely to go unsatisfied.</p>

        <h3 class="underline">High - C Individuals</h3>
        <p>
            High-C individuals find fulfillment in this culture by recognizing the worth of their work. In fact, their
            efforts are critical to the organization's structure because they keep order in a chaotic environment. Despite
            their cynicism, they perform research, analysis, and detail-oriented tasks that others avoid.
            They may become irritated, however, by the lack of clear guidelines and rules in this culture. They may also
            resent the pressure to be outgoing and energetic.</p>





    </div>
    {{-- S culture --}}
    <div class="sub-container2 page-break">
        <h1 class="text-green">DISC and group culture by Department</h1>
        <h2 class="text-lightgreen text-sub">'S' Culture</h2>

        <p>The percentage of your group members (10%) who have high scores on the Steadiness style. An S culture is
            distinguished by its stability, predictability, and friendliness. This culture values strong teamwork and a
            work-life balance that is manageable. Those who are sincere and considerate are trusted. People who thrive in
            this environment are polite, avoid conflict, and include everyone in the group's victories. Such an environment
            is ideal for those who want to improve their skills in a relaxed, team environment. People in this culture
            naturally support one another and work in a systematic manner. However, in this culture, stagnation is a risk,
            and efforts to move the company forward may be met with hesitation or indecision. Furthermore, such a culture
            may lag in terms of innovation or willingness to take on risky challenges.</p>

        <div class="float-left">
            <h4>Rewards</h4>
            <ul>
                <li>Creativity</li>
                <li>Enthusiasm</li>
                <li>Optimsim</li>
                <li>Collaboration</li>
                <li>Passion</li>
            </ul>
        </div>
        <div class="clear-left">
            <h4>Criticizes</h4>
            <ul>
                <li>Rulemaking</li>
                <li>Caution</li>
                <li>Overanalyzes</li>
                <li>Introvesion</li>
                <li>Insesitivity</li>
            </ul>
        </div>
    </div>

    <div class="sub-container2 page-break">
        <h1 class="text-green">The 'S' style within your department</h1>
        <h4 class=" mb-3" style="color: red;">*This list is group by department</h4>
        {{-- high S --}}
        <div>
            <h3>High S style</h3>
            @php
                $i = 0;
                $cound = count($sjoin);
                $counl = count($sjoinlow);
            @endphp
            @if ($cound > 0)
                <table style="width: 100%;" class="text-center">

                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Name</th>
                        {{-- <th>Low behavior</th> --}}
                        <th style="width: 20%;">Department</th>
                    </tr>

                    @foreach ($sjoin as $sjoin)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $sjoin->name }}</td>
                            {{-- <td>{{ $djoin->High }}</td> --}}

                            <td>{{ $sjoin->department }}</td>
                        </tr>
                    @endforeach

                </table>
            @else
                <h3>No records</h3>
            @endif

        </div>
        {{-- low i --}}
        <div>
            <h3>Low S style</h3>
            @if ($counl > 0)
                <table style="width: 100%;" class="text-center">

                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Name</th>
                        {{-- <th>Low behavior</th> --}}
                        <th style="width: 20%;">Department</th>
                    </tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($sjoinlow as $sjoinl)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $sjoinl->name }}</td>
                            {{-- <td>{{ $djoinl->Low }}</td> --}}

                            <td>{{ $sjoinl->department }}</td>
                        </tr>
                    @endforeach

                </table>
            @else
                <h3>No records</h3>
            @endif

        </div>
    </div>

    <div class="sub-container2 page-break">
        <h1 class="text-green">Working in the "S" Culture</h1>
        <p>The s culture offers benefits and challenges for people with each of the four DiSC' styles.</p>

        <h3 class="underline">High - D Individuals</h3>
        <p>

            In this culture, high-D people strive for results. Their desire for action drives them to make risky decisions
            and take risks. Such daring behavior can benefit the organization, which would otherwise struggle to progress.
            Others, however, may perceive their assertive behavior as rude or pushy. High-Ds, on the other hand, may find
            the atmosphere too "touchy-feely." Furthermore, the slow-paced, stable culture can be boring to the high-D
            individual, who may seek challenges elsewhere.</p>

        <h3 class="underline">High - I Individuals</h3>
        <p>
            People who are high on I provide a lot of excitement in this culture. They bring energy to projects and organize
            social activities that bring colleagues together. They create a sense of community in this way. Others, on the
            other hand, may become frustrated because some high-as i's aren't organized and dependable in their habits. At
            the same time, the high-i person is likely to grow tired of the laid-back atmosphere that this culture promotes,
            and they may express their displeasure openly.</p>

        <h3 class="underline">High - S Individuals</h3>
        <p>
            The high-S individual values the routine that this culture provides. These people respond well to the
            environment's security and look forward to the collaborative process that is so important in this culture. The
            organization comes to rely on its dedication and ever-expanding knowledge base. The disadvantage is that they
            are rarely challenged to improve their performance, accept new responsibilities, take risks, or make significant
            changes.</p>

        <h3 class="underline">High - C Individuals</h3>
        <p>
            The high-S individual values the routine that this culture provides. These people respond well to the
            environment's security and look forward to the collaborative process that is so important in this culture. The
            organization comes to rely on its dedication and ever-expanding knowledge base. The disadvantage is that they
            are rarely challenged to improve their performance, accept new responsibilities, take risks, or make significant
            changes.</p>
    </div>

    {{-- end S  --}}
    {{-- start C --}}
    <div class="sub-container2 page-break">
        <h1 class="text-green">DISC and group culture by Department</h1>
        <h2 class="text-lightgreen text-sub">'C' Culture</h2>

        <p>The percentage of your group members (10%) who have high scores on the Steadiness style. An S culture is
            distinguished by its stability, predictability, and friendliness. This culture values strong teamwork and a
            work-life balance that is manageable. Those who are sincere and considerate are trusted. People who thrive in
            this environment are polite, avoid conflict, and include everyone in the group's victories. Such an environment
            is ideal for those who want to improve their skills in a relaxed, team environment. People in this culture
            naturally support one another and work in a systematic manner. However, in this culture, stagnation is a risk,
            and efforts to move the company forward may be met with hesitation or indecision. Furthermore, such a culture
            may lag in terms of innovation or willingness to take on risky challenges.</p>

        <div class="float-left">
            <h4>Rewards</h4>
            <ul>
                <li>Accuracy</li>
                <li>Completeness</li>
                <li>Attention to detail</li>
                <li>Punctuality</li>
                <li>Dependability</li>
            </ul>
        </div>
        <div class="clear-left">
            <h4>Criticizes</h4>
            <ul>
                <li>Mistakes</li>
                <li>Intuitive decision making</li>
                <li>Lateness</li>
                <li>Spotty Research</li>
                <li>Exaggerated Enthusiasm</li>
            </ul>
        </div>
    </div>

    <div class="sub-container2 page-break">
        <h1 class="text-green">The 'C' style within your department</h1>
        <h4 class=" mb-3" style="color: red;">*This list is group by department</h4>
        {{-- high i --}}
        <div>
            <h3>High C style</h3>
            @php
                $i = 0;
                $cound = count($cjoin);
                $counl = count($cjoinlow);
            @endphp
            @if ($cound > 0)
                <table style="width: 100%;" class="text-center">

                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Name</th>
                        {{-- <th>Low behavior</th> --}}
                        <th style="width: 20%;">Department</th>
                    </tr>

                    @foreach ($cjoin as $cjoin)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $cjoin->name }}</td>
                            {{-- <td>{{ $djoin->High }}</td> --}}

                            <td>{{ $cjoin->department }}</td>
                        </tr>
                    @endforeach

                </table>
            @else
                <h3>No records</h3>
            @endif

        </div>
        {{-- low i --}}
        <div>
            <h3>Low C style</h3>
            @if ($counl > 0)
                <table style="width: 100%;" class="text-center">

                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Name</th>
                        {{-- <th>Low behavior</th> --}}
                        <th style="width: 20%;">Department</th>
                    </tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($cjoinlow as $cjoinl)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $cjoinl->name }}</td>
                            {{-- <td>{{ $djoinl->Low }}</td> --}}

                            <td>{{ $cjoinl->department }}</td>
                        </tr>
                    @endforeach

                </table>
            @else
                <h3>No records</h3>
            @endif

        </div>
    </div>

    <div class="sub-container2 page-break">
        <h1 class="text-green">Working in the "C" Culture</h1>
        <p>The C culture offers benefits and challenges for people with each of the four DiSC' styles.</p>

        <h3 class="underline">High - D Individuals</h3>
        <p>

            In this culture, high-D people strive for results. Their desire for action drives them to make risky decisions
            and take risks. Such daring behaviour can benefit the organisation, which would otherwise struggle to progress.
            Others, however, may perceive their assertive behaviour as rude or pushy. High-Ds, on the other hand, may find
            the atmosphere too "touchy-feely." Furthermore, the slow-paced, stable culture can be boring to the high-D
            individual, who may seek challenges elsewhere.</p>

        <h3 class="underline">High - I Individuals</h3>
        <p>
            People who are high on I provide a lot of the excitement in this culture. They bring energy to projects and
            organise social activities that bring colleagues together. They create a sense of community in this way. Others,
            on the other hand, may become frustrated because some high-as i's aren't organised and dependable in their
            habits. At the same time, the high-i person is likely to grow tired of the laid-back atmosphere that this
            culture promotes, and they may express their displeasure openly.</p>

        <h3 class="underline">High - S Individuals</h3>
        <p>
            The high-S individual values the routine that this culture provides. These people respond well to the
            environment's security and look forward to the collaborative process that is so important in this culture. The
            organisation comes to rely on their dedication and ever-expanding knowledge base. However, they are less likely
            to be challenged to improve their performance, accept new responsibilities, take risks, or make major changes.
        </p>

        <h3 class="underline">High - C Individuals</h3>
        <p>
            These people appreciate the fact that detail-oriented tasks and analytical abilities are valued in this culture.
            They rarely feel pressed to complete projects quickly in this environment, and they appreciate being able to
            play to their strengths on a regular basis. Furthermore, they help the organisation by ensuring that each
            concept is as refined and coherent as possible. However, they may be perceived as cold by some. In turn, High-S
            may believe that the group sacrifices accuracy in order to avoid hurt feelings.</p>
    </div>

    {{-- end C --}}

    {{-- start individual data table --}}
    <div class="sub-container2 page-break">
        <h1 class="text-green">DiSC Style</h1>
        <p class="mb-3">The percentage of your group receiving the highest segment scores in each DiSC@quadrant is shown
            in the pie chart
            below. </p>

        <img class="total" src="{{ $total }}" alt="pie total">
        <h3>Chart Summary</h3>
        <table class="text-center">
            <tr>
                <th>No.</th>
                <th>DiSC Style</th>
                <th>Total Participants</th>
            </tr>
            @php
                $i = 0;
            @endphp
                @foreach ($sum as $sum)
                <tr>
                    @php
                        $i++;
                    @endphp
                    <td>{{ $i }}</td>
                    @switch($i)
                        @case(1)
                            <td>D</td>
                            @break

                        @case(2)
                            <td>i</td>
                         @break

                        @case(3)
                            <td>S</td>
                        @break

                        @case(4)
                            <td>C</td>
                        @break


                    @break

                    @default
                @endswitch
                    <td>{{ $sum }}</td>
            </tr>
            @endforeach

    </table>
</div>

<div class="sub-container2">
    <h1 class="text-green">Individual Data Table</h1>

    <p>The table below shows the primary behavior style of each group member, organized by department and their DISC
        style. Based on Pie chart that has been shown</p>
    @php
        $i = 0;
    @endphp
    <table style="width: 100%" class="text-center">
        <tbody>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Departments</th>
                <th>Primary Style</th>
            </tr>
            @foreach ($joinall as $all)
                @php
                    $i++;
                @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $all->name }}</td>
                    <td>{{ $all->department }}</td>
                    <td>{{ $all->High }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>



{{-- DISC style --}}
@endsection
