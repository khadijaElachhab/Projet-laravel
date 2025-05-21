<!DOCTYPE html>
<html>
<head>
    <title>CV de {{ $user->name }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
            font-size: 12px;
        }
        .container {
            padding: 30px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .name {
            font-size: 24px;
            font-weight: bold;
            color: #4F46E5; /* Indigo color */
            margin-bottom: 5px;
        }
        .title {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }
        .contact-info {
            font-size: 12px;
            color: #666;
        }
        .section {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #4F46E5; /* Indigo color */
            margin-bottom: 15px;
        }
        .about-me p {
            text-align: justify;
        }
        .projects-list, .skills-list {
            margin-top: 10px;
        }
        .project-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #ccc;
        }
        .project-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }
        .project-title {
            font-weight: bold;
            font-size: 14px;
            color: #333;
        }
        .project-link {
            font-size: 10px;
            color: #1a0dab;
            margin-left: 10px;
        }
        .project-desc {
            font-size: 12px;
            color: #555;
            margin-top: 5px;
        }
        .skill-item {
            margin-bottom: 10px;
        }
        .skill-name {
            font-weight: bold;
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }
        .skill-level-bar {
            height: 8px;
            background-color: #eee;
            border-radius: 4px;
            overflow: hidden;
            width: 100%;
        }
        .skill-level-progress {
            height: 100%;
            background-color: #8B5CF6; /* Purple color */
            border-radius: 4px;
        }
         .skill-level-text {
            font-size: 10px;
            color: #555;
            margin-left: 5px;
            vertical-align: middle;
        }
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); /* Responsive grid */
            gap: 20px;
        }
        .two-columns::after {
            content: "";
            display: table;
            clear: both;
        }
        .left-column {
            float: left;
            width: 48%;
            padding-right: 30px;
            border-right: 1px solid #ccc;
            box-sizing: border-box; /* Include padding and border in element's total width */
        }
        .right-column {
            float: right;
            width: 48%;
            padding-left: 30px;
            box-sizing: border-box; /* Include padding and border in element's total width */
        }
        /* Handle case where one column might be missing */
        .two-columns .section:only-child .left-column, 
        .two-columns .section:only-child .right-column {
             float: none;
             width: 100%;
             border-right: none;
             padding-right: 0;
             padding-left: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="name">{{ $user->name }}</div>
            @if($user->title)
                <div class="title">{{ $user->title }}</div>
            @endif
            <div class="contact-info">
                {{ $user->email }}
                @if($user->username)
                     | Profil public: {{ route('profile.show', $user->username) }}
                @endif
            </div>
        </div>

        @if($user->bio)
            <div class="section about-me">
                <div class="section-title">À propos</div>
                <p>{{ $user->bio }}</p>
            </div>
        @endif

        <div class="section two-columns">
             @if($user->projects->count() > 0)
                 <div class="left-column">
                     <div class="section-title">Projets</div>
                     <div class="projects-list">
                         @foreach ($user->projects as $project)
                             <div class="project-item">
                                 <span class="project-title">{{ $project->title }}</span>
                                 @if($project->link)
                                     <span class="project-link"><a href="{{ $project->link }}">{{ $project->link }}</a></span>
                                 @endif
                                 <p class="project-desc">{{ $project->description }}</p>
                             </div>
                         @endforeach
                     </div>
                 </div>
             @endif

             @if($user->skills->count() > 0)
                 <div class="right-column">
                     <div class="section-title">Compétences</div>
                      <div class="skills-grid">
                         @foreach ($user->skills as $skill)
                             <div class="skill-item">
                                 <div class="skill-name">{{ $skill->name }}</div>
                                 <div class="flex items-center">
                                     <div class="skill-level-bar">
                                         <div class="skill-level-progress" style="width: {{ $skill->level }}%"></div>
                                     </div>
                                     <span class="skill-level-text">{{ $skill->level }}%</span>
                                 </div>
                             </div>
                         @endforeach
                     </div>
                 </div>
             @endif
         </div>

    </div>
</body>
</html> 