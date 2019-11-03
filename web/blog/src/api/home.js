import request from '@/utils/request'

/**
 * 获取首页相关链接工具接口
 * @export
 */
export function getTools (data) {
  return request({
    url: '/tool/getTools',
    method: 'post',
    params: data
  })
}

/**
 *获取学习技能
 *
 * @export
 * @param {*} data
 * @returns
 */
export function getSkills (data) {
  return request({
    url: '/tool/getSkills',
    method: 'post',
    params: data
  })
}
