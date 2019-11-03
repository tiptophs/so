import request from '@/utils/request'

/**
 *获取blog列表数据
 *
 * @export
 * @param {*} data
 * @returns
 */
export function getArticles (data) {
  return request({
    url: '/blog/getArticles',
    method: 'post',
    params: data
  })
}
