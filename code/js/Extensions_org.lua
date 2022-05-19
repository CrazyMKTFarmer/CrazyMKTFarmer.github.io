print = log

-- Consumer Page in IOKit/hid/IOHIDUsageTables.h
KEY_TYPE = {
    HOME_BUTTON = 0x40,
    VOLUME_DOWN_BUTTON = 0xEA,
    VOLUME_UP_BUTTON = 0xE9,
    POWER_BUTTON = 0x30
}

ORIENTATION_TYPE = {
    UNKNOWN = 0,
    PORTRAIT = 1, -- Device oriented vertically, home button on the bottom
    PORTRAIT_UPSIDE_DOWN = 2, -- Device oriented vertically, home button on the top
    LANDSCAPE_LEFT = 3, -- Device oriented horizontally, home button on the right
    LANDSCAPE_RIGHT = 4 -- Device oriented horizontally, home button on the left
}

CONTROLLER_TYPE = {
    LABEL = 1,
    INPUT = 2,
    PICKER = 3,
    SWITCH = 4,
    BUTTON = 5,
    REMEMBER = 6
}

----------------------------------------

function lockScreen()
    keyDown(KEY_TYPE.POWER_BUTTON);
    keyUp(KEY_TYPE.POWER_BUTTON);
end

function unlockScreen()
    keyDown(KEY_TYPE.POWER_BUTTON);
    keyUp(KEY_TYPE.POWER_BUTTON);

    usleep(1000000);

    local w, h = getScreenResolution();

    local x = 10;
    local gap = 120;
    touchDown(0, x, 200);
    while x < w do
        x = x + gap;
        usleep(16000);
        touchMove(0, x, 200);
    end
    touchUp(0, x, 200);
end

----------------------------------------

function getScreenResolution()
    local w, h = getScreenSize();
    local scale = getScreenScale();
    return w * scale, h * scale;
end

----------------------------------------

function intToRgb(intColor)
    local r = math.floor(intColor / (256 * 256));
    local g = math.floor((intColor - r * 256 * 256) / 256);
    local b = math.floor((intColor - r * 256 * 256 - g * 256));
    return r, g, b;
end

function rgbToInt(r, g, b)
    return r * 256 * 256 + g * 256 + b;
end

function getColor(x, y)
    local colors = getColors({{x,y}});
    if colors ~= nil and #colors > 0 then
    	return colors[1];
    end
    return -1;
end

-- color: the color to find
-- count: 0 means all, 1 means first, 2 means first and second
-- region: region
-- debug: debug mode
function findColor(color, count, region, debug, rightToLeft, bottomToTop)
    return findColors({{color,0,0}}, count, region, debug, rightToLeft, bottomToTop);
end

-- old dialog: dialog(controls, enableRemember, orientations)
-- new dialog: dialog(controls, orientations)
-- orientations is table type
function dialog(param1, param2, param3)
    if (type(param2) == "boolean") then
        -- process the old style
        if (param2 == true) then
            local remember = {type=CONTROLLER_TYPE.REMEMBER, on=false};
            param1[#param1+1] = remember;
        end
        local cancelButton = {type=CONTROLLER_TYPE.BUTTON, title="Cancel", color=0x5BC0DE, width=0.5, flag=0, collectInputs=false};
        param1[#param1+1] = cancelButton;
        local confirmButton = {type=CONTROLLER_TYPE.BUTTON, title="Confirm", color=0x428BCA, width=0.5, flag=1, collectInputs=true};
        param1[#param1+1] = confirmButton;

        local result = dialog2(param1, param3);
        -- old dialog
        if result == 0 then
            stop();
        end
    else
        return dialog2(param1, param2);
    end
end

function exit()
    return stop();
end

-------------deprecated-----------------
function homeButtonDown()
    keyDown(KEY_TYPE.HOME_BUTTON);
end

function homeButtonUp()
    keyUp(KEY_TYPE.HOME_BUTTON);
end

function rootPathOfDocuments()
    return rootDir();
end

function logging(logContent)
    return log(logContent);
end

function tap(x, y)
    touchDown(0, x, y);
    usleep(16000);
    touchUp(0, x, y);
end

-- color: the color to find
-- count: 0 means all, 1 means first, 2 means first and second
-- region: region
function findColorTap(color, count, region)
    local result = findColor(color, count, region);
    if result ~= nil then
        for i, v in pairs(result) do
            tap(v[1], v[2]);
            usleep(16000);
        end
    end
end

-- will block current process
function findColorsTap(colors, count, region)
    local locations = findColors(colors, count, region);
    for i, v in pairs(locations) do
        tap(v[1], v[2]);
        usleep(16000);
    end
end

function findImageTap(imagePath, count, fuzzy, ignoreColors, region)
    local locations = findImage(imagePath, count, fuzzy, ignoreColors, region);
    for i, v in pairs(locations) do
        tap(v[1], v[2]);
        usleep(16000);
    end
end

function keepFindingColor(color, count, region, func, interval, exit)
    local f = function()
        local locations = findColor(color, count, region);
        func(locations);
    end

    keep(f, interval, exit);
end

function keep(func, interval, exit)
    local f = function ()
        local firstLoop = true;
        while true do
            if exit then
                coroutine.yield();
            end
            if firstLoop then
                firstLoop = false;
            else
                usleep(interval);
            end
            func();
        end
    end

    local co = coroutine.create(f);
    coroutine.resume(co);
end

-- won't block current process
-- func: the action you want to run when the colors are found, it should be like: local f = function (locations) ... end
function keepFindingColors(colors, count, region, func, interval, exit)
    local f = function()
        local locations = findColors(colors, count, region);
        func(locations);
    end

    keep(f, interval, exit);
end

function keepFindingImage(imagePath, count, fuzzy, ignoreColors, region, func, interval, exit)
    local f = function()
        local locations = findImage(imagePath, count, fuzzy, ignoreColors, region);
        func(locations);
    end

    keep(f, interval, exit);
end

function keepFindingColorTap(color, count, region, interval, exit)
    local f = function()
        findColorTap(color, count, region);
    end

    keep(f, interval, exit);
end

function keepFindingColorsTap(colors, count, region, interval, exit)
    local f = function()
        findColorsTap(colors, count, region);
    end

    keep(f, interval, exit);
end

function keepFindingImageTap(imagePath, count, fuzzy, ignoreColors, region, interval, exit)
    local f = function()
        findImageTap(imagePath, count, fuzzy, ignoreColors, region);
    end

    keep(f, interval, exit);
end

function keyPress(keyType)
    keyDown(keyType);
    usleep(10000);
    keyUp(keyType);
end

function appIsActive(appIdentifier)
    if appIdentifier == "com.apple.SpringBoard" then
        return frontMostAppId() == nil
    end
    return "ACTIVATED" == appState(appIdentifier);
end

function appRun(appIdentifier)
    if appIdentifier == "com.apple.SpringBoard" then
        keyPress(KEY_TYPE.HOME_BUTTON);
    else
        appDoRun(appIdentifier);
    end
end

function appActivate(appIdentifier)
    if not appIsActive(appIdentifier) then
        appRun(appIdentifier);
    end
    while not appIsActive(appIdentifier) do
        usleep(500000);
    end
end
----------------------------------------

function table.val_to_str ( v )
  if "string" == type( v ) then
    v = string.gsub( v, "\n", "\\n" )
    if string.match( string.gsub(v,"[^'\"]",""), '^"+$' ) then
      return "'" .. v .. "'"
    end
    return '"' .. string.gsub(v,'"', '\\"' ) .. '"'
  else
    return "table" == type( v ) and table.tostring( v ) or
      tostring( v )
  end
end

function table.key_to_str ( k )
  if "string" == type( k ) and string.match( k, "^[_%a][_%a%d]*$" ) then
    return k
  else
    return "[" .. table.val_to_str( k ) .. "]"
  end
end

function table.tostring( tbl )
  local result, done = {}, {}
  for k, v in ipairs( tbl ) do
    table.insert( result, table.val_to_str( v ) )
    done[ k ] = true
  end
  for k, v in pairs( tbl ) do
    if not done[ k ] then
      table.insert( result,
        table.key_to_str( k ) .. "=" .. table.val_to_str( v ) )
    end
  end
  return "{" .. table.concat( result, "," ) .. "}"
end
---------------------------------------
-- pixel = {color, offsetX, offsetY}
function centerOffsetOfPixels(pixels)
    local points = {};
    for i, v in pairs(pixels) do
      table.insert(points, {v[2], v[3]});
    end

    return centerOffsetOfPoints(points);
end

-- point = {x, y}
function centerOffsetOfPoints(points)
    local firstPoint = points[1];

    local leftMost = firstPoint[1];
    local rightMost = firstPoint[1];
    local topMost = firstPoint[2];
    local bottomMost = firstPoint[2];

    for i = 2,#points do
        local v = points[i];

        if (v[1] < leftMost) then leftMost = v[1] end
        if (v[1] > rightMost) then rightMost = v[1] end
        if (v[2] < topMost) then topMost = v[2] end
        if (v[2] > bottomMost) then bottomMost = v[2] end
    end

    local size = {rightMost - leftMost, bottomMost - topMost};
    local centerOffset = {size[1] / 2 + leftMost, size[2] / 2 + topMost};
    return centerOffset;
end

function string.starts_with(str, start)
    return str:sub(1, #start) == start
end

function string.ends_with(str, ending)
    return ending == "" or str:sub(-#ending) == ending
end

function getVersion()
    local output = nil;

    local command  = "dpkg -s me.autotouch.AutoTouch.ios8 | grep '^Version:'";
    local file = assert(io.popen(command, 'r'));
    output = file:read('*all');
    file:close();

    if output == nil or output == "" then
        local command  = "dpkg -s me.autotouch.autotouch.ios8.inputtext | grep '^Version:'";
        local file = assert(io.popen(command, 'r'));
        output = file:read('*all');
        file:close();
    end

    if output == nil or output == "" then
        return nil;
    end
    if string.starts_with(output, "Version:") then
        local items = {};
        for i in string.gmatch(output, "%S+") do
            table.insert(items, i);
        end
        if #items == 2 then
            return items[2];
        else
            return nil;
        end;
    end
    return nil;
end

function currentPath()
    return playingDir;
end