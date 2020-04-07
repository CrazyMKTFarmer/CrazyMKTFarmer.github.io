local appId = frontMostAppId();
--log(string.format("RUN OK %s", appId));
appActivate("com.apple.SpringBoard");


keyDown(KEY_TYPE.HOME_BUTTON);
usleep(111422.67);
keyUp(KEY_TYPE.HOME_BUTTON);
usleep(67616.79);

keyDown(KEY_TYPE.HOME_BUTTON);
usleep(15984.46);

keyDown(KEY_TYPE.HOME_BUTTON);
usleep(71566.92);
keyUp(KEY_TYPE.HOME_BUTTON);
usleep(716440.71);

touchDown(8, 595.37, 310.47);
usleep(66613.08);
touchUp(8, 595.37, 310.47);
usleep(1033611.50);

touchDown(5, 547.62, 1074.38);
usleep(83383.21);
touchUp(5, 547.62, 1074.38);
usleep(1033090.92);

touchDown(8, 600.45, 316.54);
usleep(66578.38);
touchUp(8, 600.45, 316.54);
usleep(300146.71);

touchDown(7, 491.74, 186.86);
usleep(66857.46);
touchUp(7, 491.74, 186.86);


--nhắc sạc pin
local results = findColor(16726832, 1, region);
for i, v in pairs(results) do
toast("sạc ngay, cạn pin là tạch!", 5);
end;
usleep(200000);
--nhắc tắc LPM
local results = findColor(8229974, 1, region);
for i, v in pairs(results) do
toast("Pin vàng, ảnh hưởng tốc độ!", 5);
end;

usleep(200000);
